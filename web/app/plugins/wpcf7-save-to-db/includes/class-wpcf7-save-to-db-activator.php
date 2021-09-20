<?php

class Wpcf7_Save_to_DB_Activator {

    public static function activate() {

        if ( ! wp_next_scheduled( 'cf7std_send_email' ) ) {

            wp_schedule_event( time(), 'weekly', 'cf7std_send_email', array() );

        }

    }

}
