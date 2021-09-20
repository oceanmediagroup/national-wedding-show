<?php
    $post_id = isset( $_GET['post_id'] ) ? $_GET['post_id'] : null;
    $old_form_id = isset( $_GET['old_form_id'] ) ? $_GET['old_form_id'] : null;
?>

<h2 style="margin-top: 20px;">
    <?php _e( 'Contact form submission data', 'wpcf7-save-to-db' ); ?>
</h2>

<table class="wp-list-table widefat fixed striped emails" style="margin-top: 10px;">
    <thead>
        <tr>
            <th style="padding: 10px;" scope="col" class="manage-column column-receiver sortable asc">
                <?php _e( 'Key', 'wpcf7-save-to-db' ); ?>
            </th>
            <th style="padding: 10px;" scope="col" class="manage-column column-receiver sortable asc">
                <?php _e( 'Value', 'wpcf7-save-to-db' ); ?>
            </th>
        </tr>
    </thead>
    <tbody>

        <?php if ( $old_form_id ) : ?>

            <?php
                global $wpdb;
                $entry = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}db7_forms WHERE form_id = $old_form_id", OBJECT );
                $entry_data = unserialize( $entry[0]->form_value );
            ?>

            <?php foreach ($entry_data as $key => $value) : ?>
                <?php if ( $key !== '_edit_lock' && $key !== 'cfdb7_status' ) : ?>
                    <tr>
                        <td style="padding: 10px;">
                            <?php echo strtoupper( $key ); ?>
                        </td>
                        <td style="padding: 10px;">
                            <?php echo $value; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

        <?php else : ?>

            <?php
                $post_meta = get_post_meta( $post_id );
            ?>

            <?php foreach ($post_meta as $key => $value) : ?>
                <?php if ( $key !== '_edit_lock' ) : ?>
                    <tr>
                        <td style="padding: 10px;">
                            <?php echo strtoupper( $key ); ?>
                        </td>
                        <td style="padding: 10px;">
                            <?php echo $value[0]; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

        <?php endif; ?>

    </tbody>
</table>

<br>
<a href="#" onclick="window.history.go(-1)" class="button page-title-action">
    Go back
</a>
