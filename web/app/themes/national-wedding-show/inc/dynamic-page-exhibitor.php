<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 14/08/2018
 * Time: 10:01
 */

add_action('init', 'exhibitor_add_rewrite_rule');
function exhibitor_add_rewrite_rule()
{
    add_rewrite_rule('^exhibitor-list/([^\?]+)(\?.*)?', 'index.php?is_exhibitor_page=1&post_type=exhibitor', 'top');
    //Customize this query string - keep is_foobar_page=1 intact
    flush_rewrite_rules();
}

add_action('query_vars', 'exhibitor_set_query_var');
function exhibitor_set_query_var($vars)
{
    array_push($vars, 'is_exhibitor_page');
    return $vars;
}

add_filter('template_include', 'exhibitor_include_template', 1000, 1);
function exhibitor_include_template($template)
{
    if (get_query_var('is_exhibitor_page')) {
        $new_template = WP_CONTENT_DIR . '/themes/national-wedding-show/template-single-exhibitor.php';
        if (file_exists($new_template))
            $template = $new_template;
    }
    return $template;
}