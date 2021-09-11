<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwcfml_Cf7_Multistep_Lite {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Rtwcfml_Cf7_Multistep_Lite_Loader    $rtwcfml_loader    Maintains and registers all hooks for the plugin.
	 */
	protected $rtwcfml_loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $rtwcfml_plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $rtwcfml_plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $rtwcfml_version    The current version of the plugin.
	 */
	protected $rtwcfml_version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'RTWCFML_CF7_MULTISTEP_LITE_VERSION' ) ) {
			$this->rtwcfml_version = RTWCFML_CF7_MULTISTEP_LITE_VERSION;
		} else {
			$this->rtwcfml_version = '1.0.0';
		}
		$this->rtwcfml_plugin_name = 'cf7-multistep-lite';

		$this->rtwcfml_load_dependencies();
		$this->rtwcfml_set_locale();
		$this->rtwcfml_define_admin_hooks();
		$this->rtwcfml_define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Rtwcfml_Cf7_Multistep_Lite_Loader. Orchestrates the hooks of the plugin.
	 * - Rtwcfml_Cf7_Multistep_Lite_i18n. Defines internationalization functionality.
	 * - Rtwcfml_Cf7_Multistep_Lite_Admin. Defines all hooks for the admin area.
	 * - Rtwcfml_Cf7_Multistep_Lite_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwcfml_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/rtwcfml-class-cf7-multistep-lite-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/rtwcfml-class-cf7-multistep-lite-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/rtwcfml-class-cf7-multistep-lite-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/rtwcfml-class-cf7-multistep-lite-public.php';

		$this->rtwcfml_loader = new Rtwcfml_Cf7_Multistep_Lite_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Rtwcfml_Cf7_Multistep_Lite_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwcfml_set_locale() {

		$rtwcfml_plugin_i18n = new Rtwcfml_Cf7_Multistep_Lite_i18n();

		$this->rtwcfml_loader->rtwcfml_add_action( 'plugins_loaded', $rtwcfml_plugin_i18n, 'rtwcfml_load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwcfml_define_admin_hooks() {

		$rtwcfml_plugin_admin = new Rtwcfml_Cf7_Multistep_Lite_Admin( $this->rtwcfml_get_plugin_name(), $this->rtwcfml_get_version() );

		$this->rtwcfml_loader->rtwcfml_add_action( 'admin_enqueue_scripts', $rtwcfml_plugin_admin, 'rtwcfml_enqueue_styles' );
		$this->rtwcfml_loader->rtwcfml_add_action( 'admin_enqueue_scripts', $rtwcfml_plugin_admin, 'rtwcfml_enqueue_scripts' );
		$this->rtwcfml_loader->rtwcfml_add_filter('wpcf7_editor_panels' , $rtwcfml_plugin_admin, 'rtwwcfml_add_multistep_tab', '', 1);
		$this->rtwcfml_loader->rtwcfml_add_action('save_post_wpcf7_contact_form', $rtwcfml_plugin_admin, 'rtwwcfml_update_post_meta', '', 3); 
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwcfml_define_public_hooks() {

		$rtwcfml_plugin_public = new Rtwcfml_Cf7_Multistep_Lite_Public( $this->rtwcfml_get_plugin_name(), $this->rtwcfml_get_version() );

		$this->rtwcfml_loader->rtwcfml_add_action( 'wp_enqueue_scripts', $rtwcfml_plugin_public, 'rtwcfml_enqueue_styles' );
		$this->rtwcfml_loader->rtwcfml_add_action( 'wp_enqueue_scripts', $rtwcfml_plugin_public, 'rtwcfml_enqueue_scripts' );
		$this->rtwcfml_loader->rtwcfml_add_action('get_post_metadata', $rtwcfml_plugin_public, 'rtwwcfml_render_multistep_form' , '99999999', 4);
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function rtwcfml_run() {
		$this->rtwcfml_loader->rtwcfml_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function rtwcfml_get_plugin_name() {
		return $this->rtwcfml_plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Cf7_Multistep_Lite_Loader    Orchestrates the hooks of the plugin.
	 */
	public function rtwcfml_get_loader() {
		return $this->rtwcfml_loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function rtwcfml_get_version() {
		return $this->rtwcfml_version;
	}

}
