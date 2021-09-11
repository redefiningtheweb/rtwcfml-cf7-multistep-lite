(function( $ ) {
	'use strict';
	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $(document).ready(function(){
	 	if (rtwwcfml_ajax_param.rtwwcfml_post_metadata) {
	 		$(document).find('.rtwwcfml_next_btn').css('background-color', rtwwcfml_ajax_param.rtwwcfml_post_metadata.rtwwcfml_nxt_btn_color);      
	        $(document).find('.rtwwcfml_prev_btn').css('background-color', rtwwcfml_ajax_param.rtwwcfml_post_metadata.rtwwcfml_previous_btn_color);	        
	        $(document).find('.rtwwcfml_step_by_step_move').css('background-color', rtwwcfml_ajax_param.rtwwcfml_post_metadata.rtwwcfml_active_btn_color);
	        $(document).find('.rtwwcfml_step_by_step-nav ul').css('background-color', rtwwcfml_ajax_param.rtwwcfml_post_metadata.rtwwcfml_strip_color);
	        $(document).find('.rtwwcfml_step_by_step_move').css('width', (100/rtwwcfml_ajax_param.total_steps)+'%');
	        var rtwwcfml_type = $(document).find('.rtwwcfml_main_div').attr('data-type');
	        if ( rtwwcfml_type == 2 ) 
	        {
	        	if(rtwwcfml_ajax_param.total_steps > 7 && rtwwcfml_ajax_param.total_steps <= 10  ){
	        		$(document).find('.rtwwcfml-progress-tracker ul li').css('font-weight', '100');
	        		$(document).find('.rtwwcfml-progress-tracker ul li').css('padding', '7px 9px');
	        		$(document).find('.rtwwcfml-progress-tracker ul li span').css('font-size', '12px');
	        		$(document).find('.rtwwcfml-progress-tracker ul li.active span::after').css('width', '18px');
	        		$(document).find('.rtwwcfml-progress-tracker ul li.active span::after').css('height', '18px');
	        		$(document).find('.rtwwcfml-progress-tracker ul li.active span::after').css('text-align', 'center');
	        		$(document).find('.rtwwcfml-progress-tracker ul li.active span::after').css('margin-left', '4px');
	        		$(document).find('.rtwwcfml-progress-tracker ul li').css('text-align', 'left');
		        }
	        }
	        
	        if (rtwwcfml_type == 3) 
	        {
	        	if(rtwwcfml_ajax_param.total_steps > 6 && rtwwcfml_ajax_param.total_steps <= 10  ){
	        		$(document).find('.rtwwcfml_multistep_content_wrapper .wpcf7-form-control-wrap').css('margin-bottom', '3rem');
	        	}
	        }

	        if(rtwwcfml_ajax_param.total_steps <= 7 ){
	        	$(document).find('.rtwwcfml_step_by_step-nav li span').css('font-size', '16px');
	        }
	        if (rtwwcfml_ajax_param.total_steps >7 && rtwwcfml_ajax_param.total_steps <= 10 ) 
	        {
	        	$(document).find('.rtwwcfml_step_by_step-nav li span').css('font-size', '13px');
	        }
	 	}
	});

})(jQuery);