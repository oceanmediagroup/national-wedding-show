<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WP CF7 Save to DB
 * Plugin URI:        https://gitlab.com/michal.trykoszko/wpcf7-save-to-db
 * Description:       WP CF7 Save to database
 * Version:           1.0.0
 * Author:            MT
 * Author URI:        https://gitlab.com/michal.trykoszko/wpcf7-save-to-db
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpcf7-save-to-db
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPCF7_SAVE_TO_DB_VERSION', '1.0.0' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_wpcf7_save_to_db() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcf7-save-to-db-activator.php';
    Wpcf7_Save_to_DB_Activator::activate();
}
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_wpcf7_save_to_db() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcf7-save-to-db-deactivator.php';
	Wpcf7_Save_to_DB_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_wpcf7_save_to_db' );
register_deactivation_hook( __FILE__, 'deactivate_wpcf7_save_to_db' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpcf7-save-to-db.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpcf7_save_to_db() {
	$plugin = new Wpcf7_Save_to_DB();
}
run_wpcf7_save_to_db();
