<?php

/*------------------------------------*\
	Functions
\*------------------------------------*/

//add_filter('show_admin_bar', '__return_false');
if ( is_user_logged_in() ) {
    show_admin_bar( true );
}

add_action( 'wp_head', 'prefix_move_theme_down' );
function prefix_move_theme_down() {
  if ( is_admin_bar_showing() ) {
    ?>
    <style type="text/css">
    #headerMenu { margin-top: 28px; }
    </style>
    <?php
  }
}

add_theme_support('post-thumbnails');

// Include custom navwalker
require_once('inc/header-menu-walker.php');

// SEO edits
add_filter('disable_wpseo_json_ld_search', '__return_true');
add_filter('wpseo_json_ld_output', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function yst_wpseo_change_og_locale($locale)
{
    return 'en_GB';
}

add_filter('wpseo_locale', 'yst_wpseo_change_og_locale');

// Allow adding svg graphic through uploads
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

// Check if device is mobile
function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Main menu cards',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));

}

// Navigation
function main_menu_nav()
{
    wp_nav_menu(
        array(
            'theme_location' => 'main-menu',
            'menu' => '',
            'container' => '',
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'main-menu__links',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="main-menu__links hide-on-mobile">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        )
    );
}

function main_menu_nav_mobile()
{
    wp_nav_menu(
        array(
            'theme_location' => 'main-menu-mobile',
            'menu' => '',
            'container' => '',
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'main-menu__links',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="main-menu__links hide-on-desktop">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        )
    );
}

// Navigation
function header_menu_nav()
{
    wp_nav_menu(
        array(
            'theme_location' => 'header-menu',
            'menu' => '',
            'container' => 'nav',
            'container_class' => 'nav header__menu',
            'container_id' => '',
            'menu_class' => 'menu',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul>%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        )
    );
}

// Register Navigation
function register_menus()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'main-menu' => ('Main Menu'), // Main Navigation
        'main-menu-mobile' => ('Main Menu Mobile'), // Main Navigation mobile
        'header-menu' => ('Header Menu'), // Header Navigation
        'footer-menu' => ('Footer Menu') // Footer Navigation
    ));
}

add_action('init', 'register_menus');

// Add class to footer menu <a> elements

function add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="footer__link"', $ulclass);
}

/* add_filter('wp_nav_menu','add_menuclass'); */

// Add page slug to body class
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Pagination
function default_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

function pagination_bar($custom_query)
{

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'next_text' => __('>>'),
            'prev_text' => __('<<'),
        ));
    }
}


/*------------------------------------*\
	Actions + Filters
\*------------------------------------*/

// Add Actions
add_action('init', 'register_menus'); // Add HTML5 Blank Menu
add_action('init', 'default_wp_pagination'); // Add our HTML5 Pagination
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Footer SLider', 'html5blank'), // Rename these to suit
                'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
                'add_new' => __('Add New', 'html5blank'),
                'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
                'edit' => __('Edit', 'html5blank'),
                'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
                'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
                'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
                'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
                'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
                'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
                'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
}

add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type


// Create custom post type for locations
function create_post_type_locations()
{
    register_taxonomy_for_object_type('category', 'locations'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'locations');
    register_post_type('locations', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Locations', 'locations'), // Rename these to suit
                'singular_name' => __('Location', 'location'),
                'add_new' => __('Add New', 'locations'),
                'add_new_item' => __('Add New Location', 'locations'),
                'edit' => __('Edit', 'locations'),
                'edit_item' => __('Edit Location', 'locations'),
                'new_item' => __('New Location', 'locations'),
                'view' => __('View Location', 'locations'),
                'view_item' => __('View Location', 'locations'),
                'search_items' => __('Search Location', 'locations'),
                'not_found' => __('No Locations found', 'locations'),
                'not_found_in_trash' => __('No Locations found in Trash', 'locations')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ), // Add Category and Post Tags support
            'rewrite' => array('slug' => 'location', 'with_front' => false)
        ));
}
add_action('init', 'create_post_type_locations');


// Create custom post type for testimonials
function create_post_type_testimonials()
{
    register_post_type('testimonials', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Testimonials', 'testimonials'), // Rename these to suit
                'singular_name' => __('Testimonials', 'testimonials'),
                'add_new' => __('Add New', 'testimonials'),
                'add_new_item' => __('Add New Testimonials', 'testimonials'),
                'edit' => __('Edit', 'testimonials'),
                'edit_item' => __('Edit Testimonials', 'testimonials'),
                'new_item' => __('New Testimonials', 'testimonials'),
                'view' => __('View Testimonials', 'testimonials'),
                'view_item' => __('View Testimonials', 'testimonials'),
                'search_items' => __('Search Testimonials', 'testimonials'),
                'not_found' => __('No Testimonials found', 'testimonials'),
                'not_found_in_trash' => __('No Testimonials found in Trash', 'testimonials')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
}

add_action('init', 'create_post_type_testimonials'); // Add our HTML5 Blank Custom Post Type

// Create custom post type for testimonials
function create_post_type_b2b_testimonials()
{
    register_post_type('b2b-testimonials', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('B2B Testimonials', 'b2b-testimonials'), // Rename these to suit
                'singular_name' => __('B2B Testimonials', 'b2b-testimonials'),
                'add_new' => __('Add New', 'b2b-testimonials'),
                'add_new_item' => __('Add New B2B Testimonials', 'b2b-testimonials'),
                'edit' => __('Edit', 'b2b-testimonials'),
                'edit_item' => __('Edit B2B Testimonials', 'b2b-testimonials'),
                'new_item' => __('New B2B Testimonials', 'b2b-testimonials'),
                'view' => __('View B2B Testimonials', 'b2b-testimonials'),
                'view_item' => __('View B2B Testimonials', 'b2b-testimonials'),
                'search_items' => __('Search B2B Testimonials', 'b2b-testimonials'),
                'not_found' => __('No B2B Testimonials found', 'b2b-testimonials'),
                'not_found_in_trash' => __('No B2B Testimonials found in Trash', 'b2b-testimonials')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
}

add_action('init', 'create_post_type_b2b_testimonials'); // Add our HTML5 Blank Custom Post Type




function create_post_type_tutorials()
{
    register_post_type('tutorials', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Videos', 'tutorials'), // Rename these to suit
                'singular_name' => __('Tutorials', 'tutorials'),
                'add_new' => __('Add New', 'tutorials'),
                'add_new_item' => __('Add New Tutorial', 'tutorials'),
                'edit' => __('Edit', 'tutorials'),
                'edit_item' => __('Edit Tutorial', 'tutorials'),
                'new_item' => __('New Tutorial', 'tutorials'),
                'view' => __('View Tutorials', 'tutorials'),
                'view_item' => __('View Tutorials', 'tutorials'),
                'search_items' => __('Search Tutorials', 'tutorials'),
                'not_found' => __('No Tutorials found', 'tutorials'),
                'not_found_in_trash' => __('No Tutorials found in Trash', 'tutorials')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
}

add_action('init', 'create_post_type_tutorials'); // Add our HTML5 Blank Custom Post Type

function create_post_type_clients()
{
    register_post_type('clients', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Clients', 'clients'), // Rename these to suit
                'singular_name' => __('Clients', 'clients'),
                'add_new' => __('Add New', 'clients'),
                'add_new_item' => __('Add New Tutorial', 'clients'),
                'edit' => __('Edit', 'clients'),
                'edit_item' => __('Edit Client', 'clients'),
                'new_item' => __('New Client', 'clients'),
                'view' => __('View Clients', 'clients'),
                'view_item' => __('View Clients', 'clients'),
                'search_items' => __('Search Clients', 'clients'),
                'not_found' => __('No Clients found', 'clients'),
                'not_found_in_trash' => __('No Clients found in Trash', 'clients')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
}

add_action('init', 'create_post_type_clients'); // Add our HTML5 Blank Custom Post Type

function create_post_type_competitions()
{
    register_post_type('competitions', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Competitions', 'competitions'), // Rename these to suit
                'singular_name' => __('Competitions', 'competitions'),
                'add_new' => __('Add New', 'competitions'),
                'add_new_item' => __('Add New Competition', 'competitions'),
                'edit' => __('Edit', 'competitions'),
                'edit_item' => __('Edit Competition', 'competitions'),
                'new_item' => __('New Competition', 'competitions'),
                'view' => __('View Competitions', 'competitions'),
                'view_item' => __('View Competitions', 'competitions'),
                'search_items' => __('Search Competitions', 'competitions'),
                'not_found' => __('No Competitions found', 'competitions'),
                'not_found_in_trash' => __('No Competitions found in Trash', 'competitions')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ), // Add Category and Post Tags support
            'rewrite' => array('slug' => 'competitions', 'with_front' => false),
        ));
}

add_action('init', 'create_post_type_competitions'); // Add our HTML5 Blank Custom Post Type

function create_post_type_features()
{
    register_post_type('features', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Features', 'features'), // Rename these to suit
                'singular_name' => __('Features', 'features'),
                'add_new' => __('Add New', 'features'),
                'add_new_item' => __('Add New Feature', 'features'),
                'edit' => __('Edit', 'features'),
                'edit_item' => __('Edit Feature', 'features'),
                'new_item' => __('New Feature', 'features'),
                'view' => __('View Features', 'features'),
                'view_item' => __('View Features', 'features'),
                'search_items' => __('Search Features', 'features'),
                'not_found' => __('No Features found', 'features'),
                'not_found_in_trash' => __('No Features found in Trash', 'features')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ), // Add Category and Post Tags support
            'rewrite' => array('slug' => 'whats-on', 'with_front' => false),
        ));
}

add_action('init', 'create_post_type_features'); // Add our HTML5 Blank Custom Post Type


/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

// Add Image size
add_theme_support('post-thumbnails');
add_image_size('gallery', 1024, 720, array('center', 'center'), true);

// Shortcodes
// add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
// add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

add_filter('get_archives_link',
    function ($link_html, $url, $text, $format, $before, $after) {
        $arch_name = '';
        if (mb_strtolower(get_the_archive_title()) == ('month: ' . mb_strtolower($text))) {
            $arch_name = 'checked';
        }
        $link_html = "<li><a href='$url'>"
            . "<input type='checkbox'" . $arch_name . ">$text"
            . '</a></li>';
        return $link_html;
    }, 10, 6);

require(__DIR__ . '/inc/media-feed.php');

require(__DIR__ . '/inc/dynamic-page-exhibitor.php');

function nws_add_meta_to_rest_post() {
    register_rest_field(
        'post-type',
        'prefix-meta-key',
        array(
            'get_callback' => array( 'get_post_meta' ),
            'schema'       => null,
        )
    );
}
add_action( 'rest_api_init', 'nws_add_meta_to_rest_post', 10, 2 );


/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count=='') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/*
 * ACF fields load and save to local json
 */
add_filter('acf/settings/save_json', 'nws_acf_json_save_dir');
function nws_acf_json_save_dir( $path ) {
    $path = get_stylesheet_directory() . '/inc/acf-json';
    return $path;
}
add_filter('acf/settings/load_json', 'nws_acf_json_load_dir');
function nws_acf_json_load_dir( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/inc/acf-json';
    return $paths;
}

/*
 * Disable Gutenberg / block editor
 * This is to prevent malfunction of ACF fields in post edit
 */
add_filter( 'use_block_editor_for_post', '__return_false' );

?>
