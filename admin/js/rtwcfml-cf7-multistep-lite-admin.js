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

	 jQuery(document).ready(function(){
		// modal js

		 jQuery(".rtwwcfml_open_modal").on("click",function(){
			jQuery(".rtwwcfml_modal").addClass("rtwwcfml_modal_show");
		 });
		 jQuery(".rtwwcfml_close_modal").on("click",function(){
			jQuery(".rtwwcfml_modal").removeClass("rtwwcfml_modal_show");
		 });

 		if ( jQuery("#rtwwcfml_enbl_mltstp").prop('checked') ) {
 			
 			jQuery(document).find("#rtwwcfml_hide_form_panel").css({"opacity":"1", "visibility":"visible"});
 		}else{
 			
 			jQuery(document).find("#rtwwcfml_hide_form_panel").css({"opacity":"0", "visibility":"hidden"});
 		}
	 	var rtwwcfml_current = ".rtwwcfml_step_tab-0";
	 	var rtwwcfml_count = 1;
	 	jQuery(document).on('click',".rtwwcfml_step_add",function(e){
	 		if ( rtwwcfml_count <= 3 ) 
 			{
 				e.preventDefault();
		 		var rtwwcfml_custm_html = '';
		 		var rtwwcfml_nxt_tab = '';
		 		var rtwwcfml_currnt_html = jQuery(this);
			    var rtwwcfml_currnt_tab = '';
			    var rtwwcfml_add_html = '';
			    rtwwcfml_currnt_tab = jQuery(this).data("nxt_tab");
				rtwwcfml_add_html = '<a contenteditable="true" name="rtwwcfmlstep_name_' + rtwwcfml_currnt_tab + '" data-tab="rtwwcfml_step_tab' + rtwwcfml_currnt_tab + '" class="rtwwcfml_step_name-' + rtwwcfml_currnt_tab+' rtwwcfml_steps  rtwwcfml_steps_name-'+rtwwcfml_currnt_tab+'" href="#">Step - '+rtwwcfml_currnt_tab;
				rtwwcfml_add_html += '<i class="fas fa-times-circle rtwwcfml_close_btn rtwwcfml_remove_step" data-rtwwcfml_step_id="' + rtwwcfml_currnt_tab+'"></i>';
				rtwwcfml_add_html += '<input type="hidden" name="rtwwcfml_step_name[]" title="text" value="Step - '+ rtwwcfml_currnt_tab+'" /></a>';
			    rtwwcfml_nxt_tab = rtwwcfml_currnt_tab+1;
			    rtwwcfml_custm_html = '<div class="rtwwcfml_main_div rtwwcfml_step_tab'+rtwwcfml_currnt_tab+' hidden">'; 
	            rtwwcfml_custm_html += '<div class="rtwwcfml_second_div"><textarea id="wpcf7-form" name="rtwwcfml_steps_value[]" cols="100" rows="24" class="large-text code" data-config-field="form.body"></textarea></div></div>';
	            jQuery(".rtwwcfml_step_div").append(rtwwcfml_custm_html);
	            jQuery(rtwwcfml_add_html).appendTo('.rtwwcfml_mltstp_nav');
			    rtwwcfml_currnt_html.data("nxt_tab", rtwwcfml_nxt_tab);
			    var rtwwcfml_tabs = jQuery('.rtwwcfml_ticket_tabs');
		        var selector = jQuery('.rtwwcfml_ticket_tabs').find('a').length;
		        var rtwwcfml_activeItem = rtwwcfml_tabs.find('.rtwwcfml_ticket_tab_active');
		        var rtwwcfml_activeWidth = rtwwcfml_activeItem.innerWidth();
		        jQuery(".rtwwcfml_move_selector").css({
		            "left": rtwwcfml_activeItem.position().left + "px", 
		            "width": rtwwcfml_activeWidth + "px"
			    });
			    rtwwcfml_count++;
 			} else {
 				jQuery(document).find(".rtwwcfml_step_add").css({"opacity":"0", "visibility":"hidden"});
 			}
	 		
    	});

    	jQuery(document).find(".rtwwcfml_name").focusout(function(){
			var rtwwcfml_tab_txt = jQuery(this).text();
			rtwwcfml_tab_txt = rtwwcfml_tab_txt.replace(/^\s+|\s+$/gm, '');
			jQuery(this).children('input').val(rtwwcfml_tab_txt);
		});
		
		 jQuery(document).on('click','.rtwwcfml_submit_btn',function(e){
			 e.preventDefault();
			 var rtwwcfml_color          = jQuery('.rtwwcfml_strip_clr').val();
			 var rtwwcfml_font           = jQuery('.rtwwcfml_step_font').val();
			 var rtwwcfml_step_color     = jQuery('.rtwwcfml_step_clr').val();
			 var rtwwcfml_nxtbtn_txt     = jQuery('.rtwwcfml_nxtbtn_txt_frnt').val();
			 var rtwwcfml_prev_bt_txt    = jQuery('.rtwwcfml_btn_txt_frnt').val();
			 var rtwwcfml_bgclr_nxt      = jQuery('.rtwwcfml_nxtbtn_bg_clr_frnt').val();
			 var rtwwcfml_bgclr_prv      = jQuery('.rtwwcfml_btn_bg_clr_frnt').val();
			 var rtwwcfml_actvtab_bg_clr = jQuery('.rtwwcfml_actv_bg_clr_frnt').val();
			 var rtwwcfml_strip_bg_clr   = jQuery('.rtwwcfml_strip_bg_clr_frnt').val();
			 jQuery(document).find('.rtwwcfml_tab_wrapper').css('background-color',rtwwcfml_color);
			 jQuery(document).find('.rtwwcfml_tab_wrapper nav a').css('font-size', rtwwcfml_font);
			 jQuery(document).find('.rtwwcfml_move_selector').css('background', rtwwcfml_step_color);

			 jQuery(document).find('.rtwwcfml_stripe_clor').val(rtwwcfml_color);
			 jQuery(document).find('.rtwwcfml_tab_font').val(rtwwcfml_font);
			 jQuery(document).find('.rtwwcfml_tab_color').val(rtwwcfml_step_color);

			 jQuery(document).find('.rtwwcfml_nxt_btn_txt').val(rtwwcfml_nxtbtn_txt);
			 jQuery(document).find('.rtwwcfml_nxt_prvs_txt').val(rtwwcfml_prev_bt_txt);
			 jQuery(document).find('.rtwwcfml_nxt_btn_color').val(rtwwcfml_bgclr_nxt);
			 jQuery(document).find('.rtwwcfml_previous_btn_color').val(rtwwcfml_bgclr_prv);
			 jQuery(document).find('.rtwwcfml_active_btn_color').val(rtwwcfml_actvtab_bg_clr);
			 jQuery(document).find('.rtwwcfml_strip_color').val(rtwwcfml_strip_bg_clr);
			 jQuery(".rtwwcfml_modal").removeClass("rtwwcfml_modal_show");
		 });

	 	jQuery(document).on('click',".rtwwcfml_steps",function(e){
	 		var rtwwcfml_tab = jQuery(this).data("tab");
       		e.preventDefault();
	 		jQuery(".rtwwcfml_steps").removeClass("active");
	 		jQuery(this).addClass("active");
	 		jQuery('.rtwwcfml_main_div').hide();
	 		jQuery("."+rtwwcfml_tab).show();
	 		jQuery(".text_active").removeClass("text_active");
	 		jQuery("."+rtwwcfml_tab).find("textarea").addClass("text_active");
	 		jQuery(rtwwcfml_tab).removeClass("hidden");
        	rtwwcfml_current = rtwwcfml_tab;
	 	});

	 	jQuery('.color-field').wpColorPicker();
	 	var rtwwcfml_textarea_txt = '';
	 	jQuery( 'textarea.rtwwcfml_class' ).each( function(){
	 		rtwwcfml_textarea_txt += jQuery(this).val();
	 	});
	 	jQuery(document).find(".rtwwcfml_hidden_table.rtwwcfml_text").text(rtwwcfml_textarea_txt);

    	jQuery(document).on('click',".rtwwcfml_remove_step",function(e){
    		e.preventDefault();
    		var rtwwcfml_step_id = jQuery(this).data("rtwwcfml_step_id");
    		var rtwwcfml_prev_tab = rtwwcfml_step_id;
    		var rtwwcfml_curr_remover = $(this).parents('.rtwwcfml_mltstp_nav.rtwwcfml_ticket_tabs');
    		$(rtwwcfml_curr_remover).find('a').addClass('rtwwcfml_ticket_tab_active');
    		jQuery(document).find(".rtwwcfml_step_tab"+rtwwcfml_step_id).remove();
    		jQuery(document).find(".rtwwcfml_steps_name-"+rtwwcfml_step_id).remove();
    		jQuery(document).find(".rtwwcfml_main_div.rtwwcfml_step_tab1").show();
    		
    		var rtwwcfml_tabs = jQuery('.rtwwcfml_ticket_tabs');
	        var selector = jQuery('.rtwwcfml_ticket_tabs').find('a').length;
	        var rtwwcfml_activeItem = rtwwcfml_tabs.find('.rtwwcfml_ticket_tab_active');
	        var rtwwcfml_activeWidth = rtwwcfml_activeItem.innerWidth();
	        jQuery(".rtwwcfml_move_selector").css({
	            "left": rtwwcfml_activeItem.position().left + "px", 
	            "width": rtwwcfml_activeWidth + "px"
		    });
    	});

    	jQuery(document).on('click', '#rtwwcfml_enbl_mltstp', function(){
	 		rtwwcfml_enable_multistep('rtwwcfml_select_form_style', this);
	 	});
	 	jQuery(document).on('click', '#rtwwcfml_enbl_mltstp', function(){
	 		jQuery(document).find("#rtwwcfml_hide_form_panel").removeClass('rtwwcfml_hieght_auto');
	 		jQuery(document).find("#rtwwcfml_hide_form_panel").removeClass('rtwwcfml_hieght_null');
	 		if ( jQuery(this).prop('checked') ) {

	 			jQuery(document).find("#rtwwcfml_hide_form_panel").css({"opacity":"1", "visibility":"visible"});
	 			jQuery(document).find("#rtwwcfml_hide_form_panel").addClass('rtwwcfml_hieght_auto');
	 			jQuery(document).find(".rtwwcfml_custom_class").hide();
	 			
	 		}else{
	 			jQuery(document).find("#rtwwcfml_hide_form_panel").css({"opacity":"0", "visibility":"hidden"});
	 			jQuery(document).find("#rtwwcfml_hide_form_panel").addClass('rtwwcfml_hieght_null');
	 			jQuery(document).find(".rtwwcfml_custom_class").show();
	 		}

	 	});

	 	var rtwwcfml_tabs = jQuery('.rtwwcfml_ticket_tabs');
        var selector = jQuery('.rtwwcfml_ticket_tabs').find('a').length;
        var rtwwcfml_activeItem = rtwwcfml_tabs.find('.rtwwcfml_ticket_tab_active');
        var rtwwcfml_activeWidth = rtwwcfml_activeItem.innerWidth();
        jQuery(".rtwwcfml_move_selector").css({
            "left": rtwwcfml_activeItem.position().left + "px", 
            "width": rtwwcfml_activeWidth + "px"
        });

        jQuery(".rtwwcfml_ticket_tabs").on("click","a",function(e){
        e.preventDefault();
        jQuery('.rtwwcfml_ticket_tabs a').removeClass("rtwwcfml_ticket_tab_active");
        jQuery(this).addClass('rtwwcfml_ticket_tab_active');
            var rtwwcfml_activeWidth = jQuery(this).innerWidth();
            var rtwwcfml_itemPos = jQuery(this).position();
            jQuery(".rtwwcfml_move_selector").css({
                "left":rtwwcfml_itemPos.left + "px", 
                "width": rtwwcfml_activeWidth + "px"
            });
        });
	 });

})( jQuery );

function rtwwcfml_enable_multistep(rtwwcfml_id,rtwwcfml_check){
	if (rtwwcfml_check.checked) {
		jQuery(document).find("#rtwwcfml_enable_multstp").val('1');
		jQuery("#"+rtwwcfml_id).show();
	}else{
		jQuery(document).find("#rtwwcfml_enable_multstp").val('0');
		jQuery("#"+rtwwcfml_id).hide();
	}
}
function rtwwcfml_disable_form_panel(rtwwcfml_id,rtwwcfml_check){
	if (rtwwcfml_check.checked) {
		jQuery("#"+rtwwcfml_id).show();
		jQuery(document).find('.text_active').show();
		jQuery(document).find(".wpcf7_textarea").hide();
	}else{
		jQuery("#"+rtwwcfml_id).hide();
		jQuery(document).find('.text_active').hide();
		jQuery(".wpcf7_textarea").show();
	}
}