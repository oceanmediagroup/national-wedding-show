<?php
class Wpcf7_List_Table
{

    public function __construct()
    {
        add_action( 'admin_menu', array($this, 'add_menu_example_list_table_page' ));
    }

    public function list_table_page()
    {
        $cf7_entry_list_table = new Wpcf7_Entry_List_Table();
        $cf7_entry_list_table->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>NWS Form Submissions</h2>
                <?php $cf7_entry_list_table->display(); ?>
            </div>
        <?php
    }
}

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Wpcf7_Entry_List_Table extends WP_List_Table
{

    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        $data = $this->table_data();
        usort( $data, array( &$this, 'sort_data' ) );
        $perPage = 30;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);
        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );
        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

    public function get_columns()
    {
        $columns = array(
            'id'          => 'ID',
            'title'       => 'Title',
            'date'        => 'Date'
        );
        return $columns;
    }

    public function get_hidden_columns()
    {
        return array();
    }

    public function get_sortable_columns()
    {
        return array(
            'date' => array( 'date', false )
        );
    }

    private function table_data()
    {
        $data = array();

        global $wpdb;
        $old_results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}db7_forms", OBJECT );
        foreach( $old_results as $result ) {
            if ( $result->form_post_id == 298 ) {
                $submission = unserialize( $result->form_value );

                if ( isset( $submission['your-email'] ) ) {
                    $email = $submission['your-email'];
                } else if ( isset( $submission['yemail'] ) ) {
                    $email = $submission['yemail'];
                } else if ( isset( $submission['email'] ) ) {
                    $email = $submission['email'];
                } else {
                    $email = '';
                }

                $data[] = array(
                    'id' => $result->form_id,
                    'date' => $result->form_date,
                    'title' => $email,
                    'type' => 'old'
                );
            }
        }

        $args = array(
            'post_type' => array( 'form_submission' ),
            'fields' => 'ids'
        );
        $new_results = get_posts( $args );
        foreach( $new_results as $result ) {
            $data[] = array(
                'id' => $result,
                'date' => get_the_date( 'Y-m-d H:i:s', $result ),
                'title' => get_post_meta( $result, 'your-email' )[0],
                'type' => 'new'
            );
        }

        return $data;
    }

    public function column_default( $item, $column_name )
    {
        switch( $column_name ) {
            case 'id':
            case 'date':
                return $item[ $column_name ];
            case 'title':
                $id = $item['id'];
                $item_edit_url = $item['type'] === 'old' ? get_admin_url() . "admin.php?page=cf7std-list&old_form_id=$id" : get_admin_url() . "admin.php?page=cf7std-list&post_id=$id";
                $item_title = $item['title'];
                return "<a href='$item_edit_url'>$item_title</a>";
            default:
                return print_r( $item, true ) ;
        }
    }

    private function sort_data( $a, $b )
    {
        // Set defaults
        $orderby = 'date';
        $order = 'desc';
        // If orderby is set, use this as the sort column
        if(!empty($_GET['orderby']))
        {
            $orderby = $_GET['orderby'];
        }
        // If order is set use this as the order
        if(!empty($_GET['order']))
        {
            $order = $_GET['order'];
        }
        $result = strcmp( $a[$orderby], $b[$orderby] );
        if($order === 'asc')
        {
            return $result;
        }
        return -$result;
    }
}
