<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwcfml_Cf7_Multistep_Lite_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function rtwcfml_load_plugin_textdomain() {

		load_plugin_textdomain(
			'rtwcfml-cf7-multistep-lite',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}
