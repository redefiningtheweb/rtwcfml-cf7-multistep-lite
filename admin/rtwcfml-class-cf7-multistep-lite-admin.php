<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/admin
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwcfml_Cf7_Multistep_Lite_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rtwcfml_plugin_name    The ID of this plugin.
	 */
	private $rtwcfml_plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rtwcfml_version    The current version of this plugin.
	 */
	private $rtwcfml_version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $rtwcfml_plugin_name       The name of this plugin.
	 * @param      string    $rtwcfml_version    The version of this plugin.
	 */
	public function __construct( $rtwcfml_plugin_name, $rtwcfml_version ) {

		$this->rtwcfml_plugin_name = $rtwcfml_plugin_name;
		$this->rtwcfml_version = $rtwcfml_version;
		$this->enable_mltistep = 0;
		$this->rtwcpiglw_allow_html = array(
						      'a' => array(
						        'href' => array(),
						        'title' => array(),
						        'class' => array(),
						        'data' => array(),
						        'rel'   => array(),
						      ),
						      'br' => array(),
						      'em' => array(),
						      'ul' => array(
						          'class' => array(),
						      ),
						      'ol' => array(
						          'class' => array(),
						      ),
						      'li' => array(
						          'class' => array(),
						      ),
						      'strong' => array(),
						      'div' => array(
						        'class' => array(),
						        'data' => array(),
						        'style' => array(),
						      ),
						      'span' => array(
						        'class' => array(),
						        'style' => array(),
						      ),
						      'img' => array(
						          'alt'    => array(),
						          'class'  => array(),
						          'height' => array(),
						          'src'    => array(),
						          'width'  => array(),
						      ),
						      'select' => array(
						          'id'   => array(),
						          'class' => array(),
						          'name' => array(),
						      ),
						      'option' => array(
						          'value' => array(),
						          'selected' => array(),
						      ),
						      'label' => array(),
	    					);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function rtwcfml_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the rtwcfml_run() function
		 * defined in Cf7_Multistep_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Multistep_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$rtwcfml_screen = get_current_screen();
		if ( $rtwcfml_screen->id == 'contact_page_wpcf7-new' || $rtwcfml_screen->id == 'toplevel_page_wpcf7' ) {
			wp_enqueue_style( $this->rtwcfml_plugin_name, plugin_dir_url( __FILE__ ) . 'css/rtwcfml-cf7-multistep-lite-admin.css', array(), $this->rtwcfml_version, 'all' );
		}
		wp_enqueue_style( 'wp-color-picker' );
		if ( isset($_GET['page'] ) && $_GET['page'] = 'wpcf7' ) {
			wp_enqueue_style( "font-awesom", plugin_dir_url( __FILE__ ) . 'css/fontawesome-all.min.css', array(), $this->rtwcfml_version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function rtwcfml_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the rtwcfml_run() function
		 * defined in Cf7_Multistep_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Multistep_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->rtwcfml_plugin_name, plugin_dir_url( __FILE__ ) . 'js/rtwcfml-cf7-multistep-lite-admin.js', array( 'jquery' ), $this->rtwcfml_version, false );
		wp_enqueue_script( 'wp-color-picker');
	}
	/**
	 * Add custom tab in contact form 7 setting area.
	 *
	 * @since    1.0.0
	 */
	public function rtwwcfml_add_multistep_tab($rtwwcfml_panels){
		$rtwwcfml_panels['form-panel'] = array('title' => esc_html__('Form', 'rtwcfml-cf7-multistep-lite'), 'callback' =>array($this,'rtwwcfml_customize_wpcf7_form_panel'));
		return $rtwwcfml_panels;
	}
	/**
	 * Render custom contact form 7 form panel.
	 *
	 * @since    1.0.0
	 */
	public function rtwwcfml_customize_wpcf7_form_panel($rtwwcfml_post) {
		$this->enable_mltistep = get_post_meta( $rtwwcfml_post->id(), 'rtwwcfml_enable_multstp', true );
	    $rtwwcfml_mltstp = get_post_meta( $rtwwcfml_post->id(), 'rtwwcfml_enable_multstp', true );
	    $rtwwcfml_mltstp_type = get_post_meta( $rtwwcfml_post->id(), 'rtwwcfml_multstp_type', true );
	    if ($rtwwcfml_mltstp_type == '' || !$rtwwcfml_mltstp_type) {
	    	$rtwwcfml_mltstp_type = 1;
	    }
	    $tag_generator = WPCF7_TagGenerator::get_instance();
	    $tag_generator->print_buttons();
		include(RTWCFML_DIR.'admin/partials/wordpress-contact-form-7-multistep-custom-form-panel.php');
	}
	/**
	 * Show default form steps and HTML.
	 *
	 * @since    1.0.0
	 */
	public function rtwwcfml_default_form_steps($rtwwcfml_post=''){
		$get_form_meta = get_post_meta( $rtwwcfml_post, 'rtwwcfml_step_name_val', true );
		if ( $get_form_meta ) {
			return $get_form_meta;
		}else{
			return array( 
			 	"Step - 1" => "<label> Your name
    [text* your-name] </label>",

				"Step - 2" => "<label> Your email
    [email* your-email] </label>",

			 	"Step - 3" => "<label> Subject
    [text* your-subject] </label>
<label> Your message (optional)
    [textarea your-message] </label>

[submit \"Submit\"]",
	        );
		}
	}
	/**
	 * Update post_meta from custom setting tab.
	 *
	 * @since    1.0.0
	 */
	public function rtwwcfml_update_post_meta($rwwcfml_post_id, $rtwwcfm_post, $rtwwcfm_update) 
	{	
		if ( isset($_POST['rtwwcfml_step_name']) && !empty($_POST['rtwwcfml_step_name']) && isset($_POST['rtwwcfml_steps_value']) && !empty($_POST['rtwwcfml_steps_value'])) 
		{
			$rtwwcfm_key_val = array_combine($_POST['rtwwcfml_step_name'],$_POST['rtwwcfml_steps_value']);
			update_post_meta( $rwwcfml_post_id, 'rtwwcfml_step_name_val',$this->rtwwcfm_sanitize_array($rtwwcfm_key_val));
		}
		if ( isset($_POST['rtwwcfml_multstp_enable']) ) {
			update_post_meta( $rwwcfml_post_id, 'rtwwcfml_enable_multstp',sanitize_text_field($_POST['rtwwcfml_multstp_enable']) );
		}
		if ( isset($_POST['rtwwcfml_multistep_type']) && $_POST['rtwwcfml_multistep_type'] != '' ) {
			update_post_meta( $rwwcfml_post_id, 'rtwwcfml_multstp_type',sanitize_text_field($_POST['rtwwcfml_multistep_type']) );
		}
	}
	/**
	 * For sanitize the data.
	 *
	 * @since    1.0.0
	 */
	public function rtwwcfm_sanitize_array($rtwwcfm_data_array)
	{
		if(isset($rtwwcfm_data_array) && !empty($rtwwcfm_data_array))
		{
			$rtwwcfm_save_data_array = array();
			foreach ($rtwwcfm_data_array as $rtwwcfm_key => $rtwwcfm_value) 
			{
				if(is_array($rtwwcfm_value))
				{
					$rtwwcfm_save_data_array[$rtwwcfm_key] = $this->rtwwcfm_sanitize_array($rtwwcfm_value);
				}
				elseif($rtwwcfm_value == "true" || $rtwwcfm_value == "false" || $rtwwcfm_value == "yes" || $rtwwcfm_value == "no")
				{
					$rtwwcfm_save_data_array[$rtwwcfm_key] = filter_var($rtwwcfm_value, FILTER_VALIDATE_BOOLEAN);
				}
				else
				{
					$rtwwcfm_save_data_array[$rtwwcfm_key] = sanitize_text_field($rtwwcfm_value);
				}
			}
			return $rtwwcfm_save_data_array;
		}
	}

}
