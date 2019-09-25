<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * dlls-admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://dllstudios.com
 * @since             1.0.0
 * @package           Dlls_Cp
 *
 * @wordpress-plugin
 * Plugin Name:       Daddy Long Legs Studios Client Portal
 * Plugin URI:        http://dllstudios.com
 * Description:       This plugin allows DLL Studios to maintain your WordPress site, plus enables a simpler WordPress dashboard for the client.
 * Version:           1.0.1
 * Author:            Daddy Long Legs Studios
 * Author URI:        http://dllstudios.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dlls-cp
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
define( 'DLLS_CP_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dlls-cp-activator.php
 */
function activate_dlls_cp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dlls-cp-activator.php';
	Dlls_Cp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dlls-cp-deactivator.php
 */
function deactivate_dlls_cp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dlls-cp-deactivator.php';
	Dlls_Cp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dlls_cp' );
register_deactivation_hook( __FILE__, 'deactivate_dlls_cp' );

/**
 * The core plugin class that is used to define internationalization,
 * dlls-admin-specific hooks, and client-side-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dlls-cp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dlls_cp() {

	$plugin = new Dlls_Cp();
	$plugin->run();

}
run_dlls_cp();
