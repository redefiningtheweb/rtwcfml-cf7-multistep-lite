<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/public
 */

/**
 * The public-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    Rtwcfml_Cf7_Multistep_Lite
 * @subpackage Rtwcfml_Cf7_Multistep_Lite/public
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwcfml_Cf7_Multistep_Lite_Public {

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
		$this->rtwwcfml_err_msg = '';
	}

	/**
	 * Register the stylesheets for the public area.
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

		wp_enqueue_style( $this->rtwcfml_plugin_name, plugin_dir_url( __FILE__ ) . 'css/rtwcfml-cf7-multistep-lite-public.css', array(), $this->rtwcfml_version, 'all' );
		wp_enqueue_style( 'font-awesomes', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', array(), $this->rtwcfml_version, false);
	}

	/**
	 * Register the JavaScript for the public area.
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

		wp_enqueue_script( $this->rtwcfml_plugin_name, plugin_dir_url( __FILE__ ) . 'js/rtwcfml-cf7-multistep-lite-public.js', array( 'jquery' ), $this->rtwcfml_version, false );
		wp_enqueue_script( 'notify-js', plugin_dir_url( __FILE__ ) . 'js/notify.min.js', array( 'jquery' ), $this->rtwcfml_version, false );
	}
	/**
	 * This function render the multistep form.
	 */
	public function rtwwcfml_render_multistep_form($rtwwcfml_value, $rtwwcfml_post_id, $rtwwcfml_meta_key, $single)
	{
		if ( !is_admin() ) 
		{
			if ( $rtwwcfml_meta_key == '_form' ) 
			{
				$rtwwcfml_enbl_mstistp = get_post_meta( $rtwwcfml_post_id, 'rtwwcfml_enable_multstp', true );
				if ( $rtwwcfml_enbl_mstistp ) 
				{
					$rtwwcfml_post_metadata = array();
					$rtwwcfml_mltisteps = (get_post_meta( $rtwwcfml_post_id, 'rtwwcfml_step_name_val', true ));
					if ( $rtwwcfml_mltisteps ) 
					{
						$rtwwcfml_mltstp_msg = get_post_meta( $rtwwcfml_post_id, '_messages' );
						if(isset($rtwwcfml_mltstp_msg[0]['validation_error']) && $rtwwcfml_mltstp_msg[0]['validation_error'] != ''){
							$this->rtwwcfml_err_msg = $rtwwcfml_mltstp_msg[0]['validation_error'];
						}
						$count_tab = count($rtwwcfml_mltisteps);
						$rtwwcfml_post_metadata['rtwwcfml_nxt_btn_color'] = get_post_meta( $rtwwcfml_post_id,"rtwwcfml_nxt_btn_color",true);
						$rtwwcfml_post_metadata['rtwwcfml_nxt_btn_txt'] = get_post_meta( $rtwwcfml_post_id, 'rtwwcfml_nxt_btn_txt', true );
						$rtwwcfml_post_metadata['rtwwcfml_previous_btn_txt'] = get_post_meta( $rtwwcfml_post_id, 'rtwwcfml_nxt_prvs_txt', true );
						if ( $rtwwcfml_post_metadata['rtwwcfml_nxt_btn_txt'] == '' ) {
							$rtwwcfml_post_metadata['rtwwcfml_nxt_btn_txt'] = 'Next';
						}
						$rtwwcfml_post_metadata['rtwwcfml_previous_btn_color'] = get_post_meta( $rtwwcfml_post_id,"rtwwcfml_previous_btn_color",true);
						if ( $rtwwcfml_post_metadata['rtwwcfml_previous_btn_txt'] == '' ) {
							$rtwwcfml_post_metadata['rtwwcfml_previous_btn_txt'] = 'Previous';
						}
						$rtwwcfml_post_metadata['rtwwcfml_active_btn_color'] = get_post_meta( $rtwwcfml_post_id,"rtwwcfml_active_btn_color",true);
						$rtwwcfml_post_metadata['rtwwcfml_strip_color'] = get_post_meta( $rtwwcfml_post_id,"rtwwcfml_strip_color",true);
						$mltistep_type = get_post_meta( $rtwwcfml_post_id,"rtwwcfml_multstp_type",true);
						if ( $mltistep_type == '' || $mltistep_type == NULL ) {
							$mltistep_type = 1;
						}
						wp_enqueue_script( "rtwwcfml-template", plugin_dir_url( __FILE__ ) . 'js/rtwwcfml-template.js', array( 'jquery', 'jquery-ui-accordion' ), $this->rtwcfml_version, true);
							$rtwwcfml_ajax_nonce = wp_create_nonce( "rtwwcfml-ajax-security-string" );
							$rtwwcfml_translation_array 	= array(
														'rtwwcfml_ajaxurl' 	=> esc_url( admin_url( 'admin-ajax.php' ) ),
														'rtwwcfml_nonce' 	=> $rtwwcfml_ajax_nonce,
														'rtwwcfml_post_metadata'   => $rtwwcfml_post_metadata,
														'rtwwcfml_err_msg'   => esc_html__($this->rtwwcfml_err_msg,'rtwcfml-cf7-multistep-lite'),
														'total_steps'       => $count_tab
													);
							wp_localize_script( "rtwwcfml-template", 'rtwwcfml_ajax_param', $rtwwcfml_translation_array );
						if ( $mltistep_type ) 
						{
							if ( $mltistep_type == 1 ) 
							{
								$style_first_div = 'rtwwcfml_wrap rtwwcfml_step_by_step';
								$style_second_div = 'rtwwcfml_step_by_step-nav';
								$style_li = 'rtwwcfml_step_by_step-item';
								$style_nxt_btn = 'rtwwcfml_next_btn';
								$style_prev_btn = 'rtwwcfml_prev_btn';
								$style_btn_div = 'rtwwcfml_next';
								wp_enqueue_style( "rtwwcfml-template-first",  plugin_dir_url( __FILE__ ) . 'partials/rtwwcfml-template-first.css', array(), $this->rtwcfml_version, false );
							}
							else if ( $mltistep_type == 2 ) 
							{
								$style_nxt_btn = 'rtwwcfml_next_btn';
								$style_prev_btn = 'rtwwcfml_prev_btn';
								$style_btn_div = 'rtwwcfml_next';
								$style_first_div = 'rtwwcfml_wrap rtwwcfml_prcoess_main_wrap';
								$style_second_div = 'rtwwcfml-progress-tracker';
								$style_li = 'rtwwcfml-progress-item';
								wp_enqueue_style( "rtwwcfml-template-second",  plugin_dir_url( __FILE__ ) . 'partials/rtwwcfml-template-second.css', array(), $this->rtwcfml_version, false );
							}
							else if ( $mltistep_type == 3 ) 
							{
								$style_nxt_btn = 'rtwwcfml_next_btn';
								$style_prev_btn = 'rtwwcfml_prev_btn';
								$style_btn_div = 'rtwwcfml_next';
								$style_first_div  = 'rtwwcfml_wrap rtwwcfml_appointment_main__wrapper';
								$style_second_div = 'rtwwcfml_appointment_tracker';
								$style_li         = 'rtwwcfml_appointment_tracker_item';
								wp_enqueue_style( "rtwwcfml-template-third",  plugin_dir_url( __FILE__ ) . 'partials/rtwwcfml-template-third.css', array(), $this->rtwcfml_version, false );
							}
							else if ( $mltistep_type == 4) 
							{
								$style_nxt_btn = 'rtwwcfml_next_btn';
								$style_prev_btn = 'rtwwcfml_prev_btn';
								$style_btn_div = 'rtwwcfml_next';
								$style_first_div  = 'rtwwcfml_wrap rtwwcfml_appointment_main__wrapper';
								$style_second_div = 'rtwwcfml_appointment_tracker';
								$style_li         = 'rtwwcfml_appointment_tracker_item';
								wp_enqueue_style( "rtwwcfml-template-fourth",  plugin_dir_url( __FILE__ ) . 'partials/rtwwcfml-template-fourth.css', array(), $this->rtwcfml_version, false );
							}
							ob_start();
							?>
		                    <div class="rtwwcfml_main_div <?php echo esc_attr($style_first_div); ?>" data-type="<?php echo esc_attr($mltistep_type); ?>">
		                    	<div class="<?php echo esc_attr($style_second_div); ?>">
		                    		<ul class="rtwwcfml_tab_list_wrapper">
		                    			<?php  
		                    				$count = 1;
		                    				foreach ($rtwwcfml_mltisteps as $k => $v) 
		                    				{ ?>
		                    					<li class="rtwwcfml_tab_list <?php if( $count== 1){echo "rtwwcfml_previous  active";} ?> rtwwcfml-steps<?php echo esc_attr($count); ?> <?php  echo esc_attr($style_li); ?>"  data-tab=".rtwwcfml-tab-<?php echo esc_attr($count); ?>">
		                    						<?php if($mltistep_type != 4){ ?>
		                    						<span><?php esc_html_e($k,'rtwcfml-cf7-multistep-lite'); ?></span>
		                    					<?php }else{ ?>
	                    						<div class="rtwwcfml_tab_item">
		                    							<div class="rtwwcfml_tab_<?php echo esc_attr($count); ?> rtwwcfml_tab_number <?php if( $count== 1){echo "rtwwcfml_active_number";} ?>">
		                    								<div class="rtwwcfml_tab_number_text" id="rtwwcfml_tab_<?php echo $count; ?>"><?php echo wp_kses_post($count); ?></div>
				                    						<div class="rtwwcfml_tab_icon rtwwcfml_tab_icon_<?php echo $count; ?>" data-step="<?php echo esc_attr($count); ?>">
									                            <i class="fas fa-check"></i>
									                        </div>
									                    </div>
		                    						<div><?php esc_html_e($k,'rtwcfml-cf7-multistep-lite'); ?></div>
		                    					</div>
		                    				<?php	} ?>
		                    					</li>
		                    		    <?php $count++; }
		                    			?>
		                    		</ul>
		                    		<?php if( $mltistep_type != 4 ){ ?>
		                    		<div class="rtwwcfml_step_by_step_move" style="width: 20%;"></div>
		                    	<?php } ?>
		                    	</div>
		                    	<div class="rtwwcfml_multistep_content_wrapper">
		                    		<?php
		                    			$count = 1;
		                    			foreach ($rtwwcfml_mltisteps as $step_k => $step_v) 
		                    			{ ?>
		                    				<div class="<?php if( $count!= 1){ echo "rtwwcfml_hidden";} ?> rtwwcfml-tab-<?php echo esc_attr($count); ?>" >
		                    					<div class="cf7-content-tab">
				                                    <?php

				                                     
				                                     echo wp_kses_post($step_v) ;  // This variable contains HTML

				                                     ?>
				                                </div>
				                                <div class="multistep-nav rtwwcfml_prcoess_stpes_btns">
				                                	<div class="<?php echo esc_attr($style_btn_div); ?> rtwwcfml_prev multistep-nav-left">
				                                        <?php  if( $count!=1 ){ ?>
				                                         <a href="#" class="<?php echo esc_attr($style_prev_btn); ?> rtwwcfml_prev_btn" data-pre="<?php echo ($count-1); ?>"><?php esc_html_e($rtwwcfml_post_metadata['rtwwcfml_previous_btn_txt'],'rtwcfml-cf7-multistep-lite');  ?>
				                                         </a>
				                                        <?php } ?>
				                                    </div>
				                                    <div class="rtwwcfml_next_note multistep-nav-right rtwwcfp_next <?php echo esc_attr($style_btn_div); ?>">
				                                        <?php if( $count_tab != $count ): ?>
				                                        <a href="#" class="<?php if($mltistep_type == 3 && $count != 1) { echo "rtwwcfml_nxt_button"; } ?> rtwcpig_red <?php echo esc_attr($style_nxt_btn); ?>" data-next="rtwwcfml-tab-<?php echo ($count+1); ?>" data-prev="rtwwcfml-tab-<?php echo ($count-1); ?>"><?php esc_html_e($rtwwcfml_post_metadata['rtwwcfml_nxt_btn_txt'],'rtwcfml-cf7-multistep-lite'); ?> </a>
				                                        <?php endif; ?>
				                                    </div>
				                                </div>
		                    				</div>
		                    	  <?php $count++; }
		                    		?>
		                    	</div>
		                    </div>
		                    <?php
		                    $rtwwcfml_value = ob_get_clean();
						}
					}
				}
			}
			return $rtwwcfml_value;
		}
		
	}

}
