<?php

/**
 * The client-side-facing functionality of the plugin.
 *
 * @link       http://dllstudios.com
 * @since      1.0.0
 *
 * @package    Dlls_Cp
 * @subpackage Dlls_Cp/client-side
 */

/**
 * The client-side-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the client-side-facing stylesheet and JavaScript.
 *
 * @package    Dlls_Cp
 * @subpackage Dlls_Cp/client-side
 * @author     Daddy Long Legs Studios <mike@dllstudios.com>
 */
class Dlls_Cp_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the client-side-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dlls-cp-client-side.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the client-side-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dlls-cp-client-side.js', array( 'jquery' ), $this->version, false );

	}

}
