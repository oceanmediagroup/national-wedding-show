<?php

if ( ! class_exists( 'Wpcf7_List_Table' ) ) {
    require_once( 'class-wpcf7-list-table.php' );
}

$table = new Wpcf7_List_Table();
$table->list_table_page();

?>

<style>
    .toplevel_page_cf7std-list td.id,
    .toplevel_page_cf7std-list th.column-id {
        width: 15%;
    }
    .toplevel_page_cf7std-list td.title,
    .toplevel_page_cf7std-list th.column-title {
        width: 60%;
    }
    .toplevel_page_cf7std-list td.date,
    .toplevel_page_cf7std-list th.column-date {
        width: 25%;
    }
</style>
