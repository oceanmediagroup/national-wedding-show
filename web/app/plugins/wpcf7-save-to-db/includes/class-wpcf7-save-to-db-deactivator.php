<?php

class Wpcf7_Save_to_DB_Deactivator
{

    public static function deactivate()
    {

        $timestamp = wp_next_scheduled( 'cf7std_send_email' );
        wp_unschedule_event( $timestamp, 'cf7std_send_email' );

    }

}
