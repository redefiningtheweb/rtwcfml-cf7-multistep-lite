<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.redefiningtheweb.com
 * @since             1.0.0
 * @package           Rtwcfml_Cf7_Multistep_Lite
 *
 * @wordpress-plugin
 * Plugin Name:       Multistep Module for Contact Form 7
 * Plugin URI:        www.redefiningtheweb.com/woocommerce-wordpress-plugins/
 * Description:       This plugin allows you to split WordPress Contact Form 7 into various parts.
 * Version:           1.0.0
 * Author:            RedefiningTheWeb
 * Author URI:        www.redefiningtheweb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rtwcfml-cf7-multistep-lite
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
define( 'RTWCFML_CF7_MULTISTEP_LITE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/rtwcfml-class-cf7-multistep-lite-activator.php
 */
function rtwcfml_activate_cf7_multistep_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/rtwcfml-class-cf7-multistep-lite-activator.php';
	Rtwcfml_Cf7_Multistep_Lite_Activator::rtwcfml_activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/rtwcfml-class-cf7-multistep-lite-deactivator.php
 */
function rtwcfml_deactivate_cf7_multistep_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/rtwcfml-class-cf7-multistep-lite-deactivator.php';
	Rtwcfml_Cf7_Multistep_Lite_Deactivator::rtwcfml_deactivate();
}

register_activation_hook( __FILE__, 'rtwcfml_activate_cf7_multistep_lite' );
register_deactivation_hook( __FILE__, 'rtwcfml_deactivate_cf7_multistep_lite' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/rtwcfml-class-cf7-multistep-lite.php';
/**
 * This function is used to check woocommerce is activated or not.
 *
 * @since    1.0.0
 * @access   public
 */
function rtwcfml_check_run_allows() 
{
    $rtwcfml_status = true;
    if(  !in_array('contact-form-7/wp-contact-form-7.php', apply_filters('active_plugins', get_option('active_plugins') ) ) )
    {
        $rtwcfml_status = false;
    }

    return $rtwcfml_status;
}

if ( rtwcfml_check_run_allows() ) 
{
    //Plugin Constant
    if ( !defined( 'RTWCFML_DIR' ) ) {
        define('RTWCFML_DIR', plugin_dir_path( __FILE__ ) );
    }
    if ( !defined( 'RTWCFML_URL' ) ) {
        define('RTWCFML_URL', plugin_dir_url( __FILE__ ) );
    }
    if ( !defined( 'RTWCFML_HOME' ) ) {
        define('RTWCFML_HOME', home_url() );
    }
    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function rtwcfml_run_cf7_multistep_lite() {

        $plugin = new Rtwcfml_Cf7_Multistep_Lite();
        $plugin->rtwcfml_run();

    }
    rtwcfml_run_cf7_multistep_lite();
}
else
{

    /**
    * Show plugin error notice.
    *
    * @since 1.0.0
    */
    function rtwcfml_error_notice()
    {
    ?>
        <div class="error notice is-dismissible">
        <p><?php esc_html_e( 'Contact Form 7 plugin is not activated, Please activate Contact Form 7 plugin first to install Contact Form 7 Multistep Lite.', 'rtwcfml-cf7-multistep-lite' ); ?></p>
        </div>
        <style type="text/css">
        #message
        {
            display: none;
        }
        </style>
        <?php
    }
    /**
    * Deactivate Plugin if contact form 7 not active
    * @since 1.0.0
    */
    function rtwcfml_deactivate_wordpress_contact_form_7_pdf()
    {
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        deactivate_plugins( plugin_basename( __FILE__ ) );
        add_action('admin_notices', 'rtwcfml_error_notice');
    }
    add_action( 'admin_init', 'rtwcfml_deactivate_wordpress_contact_form_7_pdf' );

}
