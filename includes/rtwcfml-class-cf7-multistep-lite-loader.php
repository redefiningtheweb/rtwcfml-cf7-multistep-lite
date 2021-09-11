<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwcfml_Cf7_Multistep_Lite_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $rtwcfml_actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $rtwcfml_actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $rtwcfml_filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $rtwcfml_filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->rtwcfml_actions = array();
		$this->rtwcfml_filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $rtwcfml_hook             The name of the WordPress action that is being registered.
	 * @param    object               $rtwcfml_component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $rtwcfml_callback         The name of the function definition on the $rtwcfml_component.
	 * @param    int                  $rtwcfml_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $rtwcfml_accepted_args    Optional. The number of arguments that should be passed to the $rtwcfml_callback. Default is 1.
	 */
	public function rtwcfml_add_action( $rtwcfml_hook, $rtwcfml_component, $rtwcfml_callback, $rtwcfml_priority = 10, $rtwcfml_accepted_args = 1 ) {
		$this->rtwcfml_actions = $this->rtwcfml_add( $this->rtwcfml_actions, $rtwcfml_hook, $rtwcfml_component, $rtwcfml_callback, $rtwcfml_priority, $rtwcfml_accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $rtwcfml_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $rtwcfml_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $rtwcfml_callback         The name of the function definition on the $rtwcfml_component.
	 * @param    int                  $rtwcfml_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $rtwcfml_accepted_args    Optional. The number of arguments that should be passed to the $rtwcfml_callback. Default is 1
	 */
	public function rtwcfml_add_filter( $rtwcfml_hook, $rtwcfml_component, $rtwcfml_callback, $rtwcfml_priority = 10, $rtwcfml_accepted_args = 1 ) {
		$this->rtwcfml_filters = $this->rtwcfml_add( $this->rtwcfml_filters, $rtwcfml_hook, $rtwcfml_component, $rtwcfml_callback, $rtwcfml_priority, $rtwcfml_accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $rtwcfml_hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $rtwcfml_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $rtwcfml_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $rtwcfml_callback         The name of the function definition on the $component.
	 * @param    int                  $rtwcfml_priority         The priority at which the function should be fired.
	 * @param    int                  $rtwcfml_accepted_args    The number of arguments that should be passed to the $rtwcfml_callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function rtwcfml_add( $rtwcfml_hooks, $rtwcfml_hook, $rtwcfml_component, $rtwcfml_callback, $rtwcfml_priority, $rtwcfml_accepted_args ) {

		$rtwcfml_hooks[] = array(
			'hook'          => $rtwcfml_hook,
			'component'     => $rtwcfml_component,
			'callback'      => $rtwcfml_callback,
			'priority'      => $rtwcfml_priority,
			'accepted_args' => $rtwcfml_accepted_args
		);

		return $rtwcfml_hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function rtwcfml_run() {

		foreach ( $this->rtwcfml_filters as $rtwcfml_hook ) {
			add_filter( $rtwcfml_hook['hook'], array( $rtwcfml_hook['component'], $rtwcfml_hook['callback'] ), $rtwcfml_hook['priority'], $rtwcfml_hook['accepted_args'] );
		}

		foreach ( $this->rtwcfml_actions as $rtwcfml_hook ) {
			add_action( $rtwcfml_hook['hook'], array( $rtwcfml_hook['component'], $rtwcfml_hook['callback'] ), $rtwcfml_hook['priority'], $rtwcfml_hook['accepted_args'] );
		}

	}

}
