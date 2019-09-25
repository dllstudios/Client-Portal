<?php

/**
 * The dlls-admin-specific functionality of the plugin.
 *
 * @link       http://dllstudios.com
 * @since      1.0.0
 *
 * @package    Dlls_Cp
 * @subpackage Dlls_Cp/dlls-admin
 */

/**
 * The dlls-admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dlls-admin-specific stylesheet and JavaScript.
 *
 * @package    Dlls_Cp
 * @subpackage Dlls_Cp/dlls-admin
 * @author     Daddy Long Legs Studios <mike@dllstudios.com>
 */
class Dlls_Cp_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the dlls-admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Dlls_Cp_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Dlls_Cp_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/dlls-cp-dlls-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the dlls-admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Dlls_Cp_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Dlls_Cp_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/dlls-cp-dlls-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard Menu
     *
     * @since 1.0.0
     */

    public function add_plugin_admin_menu()
    {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         */
        add_options_page('DLL Studios Client Portal Setup','DLL Studios Client Portal',
            'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
    }

    /**
     * Add settings action link to the plugin page.
     *
     * @since 1.0.0
     */

    public function add_action_links($links)
    {
        /*
         * Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
         */
        $settings_link = array(
            '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge($settings_link, $links);
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page()
    {
        include_once('partials/dlls-cp-admin-display.php');
    }

	public function validate( $input ) {
		$valid = array();

		$valid['favicon'] = (isset($input['favicon']) && !empty($input['favicon'])) ? 1 : 0;
		$valid['footer'] = ( isset( $input['footer'] ) && ! empty( $input['footer'] ) ) ? 1 : 0;
		$valid['toolbar'] = ( isset( $input['toolbar'] ) && ! empty( $input['toolbar'] ) ) ? 1 : 0;
		$valid['dlls_wp_update'] = ( isset( $input['dlls_wp_update'] ) && ! empty( $input['dlls_wp_update'] ) ) ? 1 : 0;
		$valid['plugin'] = ( isset( $input['plugin'] ) && ! empty( $input['plugin'] ) ) ? 1 : 0;
		$valid['gutenburg'] = ( isset( $input['gutenburg'] ) && ! empty( $input['gutenburg'] ) ) ? 1 : 0;

		return $valid;
    }

	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }
}
