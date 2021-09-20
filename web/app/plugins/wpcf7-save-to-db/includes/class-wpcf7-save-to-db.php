<?php

// ..

class Wpcf7_Save_to_DB {

    public $plugin_name = 'WP Remind Me';
    public $csv_title;

    function __construct() {

        $this->register_cron_action();

        add_action( 'init', array( $this, 'create_submissions_cpt' ), 0 );
        // add_action( 'edit_form_after_title', array( $this, 'customize_cpt_screen' ) );
        add_filter( 'cron_schedules', array( $this, 'add_cron_shedules' ) );
        add_action( 'wpcf7_before_send_mail', array( $this, 'before_cf7_submission' ) );

        add_action( 'admin_menu', array( $this, 'add_menu_page' ) );

        $this->set_tempfile_name();

    }

    /**
     * Add menu page for submissions
     */
    public function add_menu_page( $query ) {

        add_menu_page(
            'NWS Form Submissions',
            'NWS Form Submissions',
            'manage_options',
            'cf7std-list',
            array( $this, 'display_entry_list' ),
            'dashicons-email'
        );

    }

    /**
     * Display all entries, old ones also
     */
    public function display_entry_list() {

        if ( isset( $_GET['post_id'] ) || isset( $_GET['old_form_id'] ) ) {
            require_once 'cpt-screen-table.php';
        } else {
            require_once 'cpt-list-table.php';
        }

    }

    /**
     * Get dates and set csv file name
     */
    public function set_tempfile_name() {

        $this->csv_title = 'nws_contact_form_submissions_' . date('d.m', strtotime('-7 days')) . '-' . date( 'd.m' ) . '.csv';

    }

    /**
     * Register custom post type `form_submission`
     */
    public function create_submissions_cpt() {

        require_once 'cpt-register.php';

    }

    /**
     * Add a table with all values in CPT edit screen
     */
    public function customize_cpt_screen() {

        global $post;

        if ( $post->post_type === 'form_submission' || $post->post_type === 'wpcf7_contact_form' ) {

            require_once 'cpt-screen-table.php';

        }

    }

    /**
     * Hook info CF7 mail submission and catch submission data
     * Add a post of CPT `form_submission` to dabase
     */
    public function before_cf7_submission( $cf7 ) {

        $wpcf7 = WPCF7_ContactForm::get_current();
        $submission = WPCF7_Submission::get_instance();

        if ( $submission ) {

            $form_data = $submission->get_posted_data();

            $email = $form_data['your-email'];
            $title = "$wpcf7->title - form submission from - $email";

            $post_id = wp_insert_post( array(
                'post_title' => $title,
                'post_type' => 'form_submission',
                'post_status' => 'publish'
            ) );

            add_post_meta( $post_id, 'form-title', $wpcf7->title );

            /**
             * Thanks CF7DB for the blacklist
             */
            $black_list = array('_wpcf7', '_wpcf7_version', '_wpcf7_locale', '_wpcf7_unit_tag',
            '_wpcf7_is_ajax_call','cfdb7_name', '_wpcf7_container_post','_wpcf7cf_hidden_group_fields',
            '_wpcf7cf_hidden_groups', '_wpcf7cf_visible_groups', '_wpcf7cf_options', 'g-recaptcha-response');

            foreach ($form_data as $key => $value) {

                if ( !in_array($key, $black_list ) ) {

                    /**
                     * Extract the value itself instead of whole Array/Object
                     */
                    if ( is_object( $value ) || is_array( $value ) ) {

                        $val_arr = array();
                        $i = 0;
                        foreach( $value as $val ) {
                            $val_arr[] = $val[$i];
                            $i++;
                        }

                        add_post_meta( $post_id, $key, implode( ', ', $val_arr ) );

                    } else {

                        add_post_meta( $post_id, $key, $value );

                    }


                }

            }

            $response = $this->send_submission_to_endpoint( $post_id );

        }

    }

    /**
     * Sends the form submission to the provided API
     */
    public function send_submission_to_endpoint( $id ) {

        $endpoint = getenv('WPCF7_API_URL');
        $api_user = getenv('WPCF7_API_USER');
        $api_pass = getenv('WPCF7_API_PASSWORD');

        $fields = get_post_meta( $id );
        $fields_to_send = array();

        foreach ( $fields as $key => $val ) {
            if ( $key !== '_edit_lock' && $key !== '_api-response' || $key !== '_api-request-fields' ) {
                if ( $key === 'checkbox-agree' || $key === 'checkbox-marketing' ) {
                    if ( strlen( $val[0] ) > 0 ) {
                        $fields_to_send[] = array(
                            'key' => strtoupper( $key ),
                            'value' => 'true'
                        );
                    }
                } else {
                    $fields_to_send[] = array(
                        'key' => strtoupper( $key ),
                        'value' => $val[0]
                    );
                }
            }
        }

        $args = array(
            'method' => 'POST',
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode( "$api_user:$api_pass" )
            ),
            'body' => json_encode(
                array(
                    'email' => get_post_meta( $id, 'your-email', true ),
                    'optInType' => 'Single',
                    'emailType' => 'Html',
                    'dataFields' => $fields_to_send
                )
            )
        );

        $response = wp_remote_post( $endpoint, $args );

        return $response;

    }

    /**
     * Get last week's form entries
     */
    public function get_last_weeks_entries() {

        $args = array(
            'post_type' => 'form_submission',
            'orderby' => 'date',
            'order' => 'DESC',
            'date_query' => array(
                array(
                    'after' => '1 week ago'
                )
            ),
            'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash'),
            'fields' => 'ids',
            'posts_per_page' => -1
        );

        $entry_ids = get_posts( $args );

        // Open temp file pointer
        $temp_file_path = sys_get_temp_dir() . '/' . $this->csv_title;

        $fd = fopen( $temp_file_path, 'w' );
        if ( $fd === FALSE ) {
            die( 'Failed to open temp file' );
        }

        $header = array(
            array(
                'Form title',
                'Fname',
                'Lname',
                'Company name',
                'Type of business',
                'Town',
                'Postcode',
                'Country',
                'Email',
                'Telephone',
                'Which show'
            )
        );

        // Add CSV headers
        foreach ( $header as $header_cell ) {
            fputcsv( $fd, $header_cell );
        }

        // Loop data and write to file pointer
        foreach( $entry_ids as $id ) {

            $post_meta = get_post_meta( $id );
            $arr = array();

            foreach ( $post_meta as $key => $value ) {

                if ( $key !== '_edit_lock' ) {

                    $arr[] = implode( ',', $value );

                }

            }

            fputcsv( $fd, $arr );

        }

        fclose( $fd );

    }

    /**
     * Create a new WP Cron shedule
     */
    public function add_cron_shedules($schedules) {

        if( !isset( $schedules['weekly']) ) {

            $schedules['weekly'] = array(
                'interval' => 604800,
                'display' => __('Once a week')
            );

        }

        return $schedules;

    }

    /**
     * Register a cron action
     */
    public function register_cron_action() {

        add_action( 'cf7std_send_email', array( $this, 'send_email_with_list' ) );

    }

    /**
     * Send e-mail with entries from last 7 days
     */
    public function send_email_with_list() {

        require( ABSPATH . 'wp-load.php' );

        $this->get_last_weeks_entries();

        $to = get_field( 'wpcf7_to_email', 'option' );
        $from = get_field( 'wpcf7_from_email', 'option' );
        $name = get_bloginfo('name');

        $headers = "From: NWS <$from>\r\n";
        $subject = 'NWS - Contact form submissions from last week';
        $msg = 'Contact form submissions from last week';
        $attachment = array( sys_get_temp_dir() . '/' . $this->csv_title );

        $mail = json_encode( array(
            'to' => $to,
            'subject' => $subject,
            'msg' => $msg,
            'headers' => $headers,
            'attachment' => $attachment
        ) );
        error_log($mail);

        wp_mail($to, $subject, $msg, $headers, $attachment);

        $this->remove_temp_file();

    }

    /**
     * Remove temporary file after sending e-mail
     */
    public function remove_temp_file() {

        $file = sys_get_temp_dir() . '/' . $this->csv_title;
        wp_delete_file( $file );

    }

}
