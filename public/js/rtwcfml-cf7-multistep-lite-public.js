(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
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


	 	//Multistep js.

        jQuery(".rtwwcfml_prev_btn").on('click',function(e){
            e.preventDefault();
            var rtwwcfml_prev_tab = jQuery(this).data('pre');
            var rtwwcfml_positions = '';
            var rtwwcfml_cnt = 0;
            var rtwwcfml_style_type = jQuery(document).find('.rtwwcfml_wrap').data('type');
            jQuery(document).find('.wpcf7-response-output').hide();
            jQuery(document).find('.rtwwcfml-steps'+rtwwcfml_prev_tab).addClass('active');
            jQuery(document).find('.rtwwcfml-tab-'+rtwwcfml_prev_tab).show();
            var rtwwcfml_nxt_step = rtwwcfml_prev_tab+1;
            jQuery(document).find('.rtwwcfml-steps'+rtwwcfml_nxt_step).removeClass('active');
            jQuery(document).find('.rtwwcfml-tab-'+rtwwcfml_nxt_step).hide();
            jQuery(document).find('.rtwwcfml_step_by_step-item').each(function(){
                if(jQuery(this).hasClass('active') && rtwwcfml_cnt == 0)
                {
                    rtwwcfml_cnt++;
                    rtwwcfml_positions = jQuery(this).position(); 
                }
            });
            jQuery('.rtwwcfml_step_by_step_move').css("left",  rtwwcfml_positions.left);
            if ( rtwwcfml_style_type == 4 ) 
            {
                jQuery(document).find(".rtwwcfml_tab_"+(rtwwcfml_prev_tab)).removeClass('rtwwcfml_active_number');
                jQuery(document).find(".rtwwcfml_tab_"+(rtwwcfml_prev_tab)).addClass('rtwwcfml_active_number');
                jQuery(document).find(".rtwwcfml_tab_"+(rtwwcfml_prev_tab)).removeClass('rtwwcfml_completed_action'); 
                jQuery(document).find("#rtwwcfml_tab_"+(rtwwcfml_prev_tab)).show();
                jQuery(document).find(".rtwwcfml_tab_icon_"+(rtwwcfml_prev_tab)).hide();
            }
        });
            
        var rtwwcfml_type = $(document).find('.rtwwcfml_main_div').attr('data-type');

        jQuery(".rtwwcfml_next_btn").on('click',function(e){
            e.preventDefault();
            var rtwwcfml_Obj = jQuery(this).parent().parent().parent();
            var rtwwcfml_main_div_obj = jQuery(this).parent().parent().parent().parent().parent();
            var rtwwcfml_curr_div = jQuery(this);
            var rtwwcfml_nxt_div = rtwwcfml_curr_div.data("next");
            var rtwwcfml_prev_div = rtwwcfml_nxt_div.split("-");
            var rtwwcfml_style_type = '';
            var rtwwcfml_count = '';
            var rtwwcfml_positions = '';
            var rtwwcfml_error = false;
            var rtwwcfml_style_type = jQuery(document).find('.rtwwcfml_wrap').data('type');
            var rtwwcfml_step = rtwwcfml_main_div_obj.find(".rtwwcfml_tab_icon").data('step');
            console.log(rtwwcfml_main_div_obj.find(".rtwwcfml_tab_icon").data('step'));
            if ( rtwwcfml_Obj ) 
            {
                //alert(test.find(".rtwwcfml_tab_icon").data('step'));
                if(jQuery(this).hasClass("rtwwcfml_nxt_button")){
                    console.log( jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify'));
                    jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').css("padding", '10px');
                }
                else{
                    jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').css("width", '370px');
                }

                
                //jQuery(document).find('.wpcf7-response-output').hide();
                rtwwcfml_Obj.find('input.wpcf7-text[type="text"]').each(function(){
                    var rtwwcfml_text_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_text = jQuery(this).val();
                    if ( rtwwcfml_text_req == 'true' ) 
                    {
                        if (rtwwcfml_text == '') 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500,className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-base.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;         
                        }
                    }                    
                });
                rtwwcfml_Obj.find('input.wpcf7-text.wpcf7-email[type="email"]').each(function(){
                    var rtwwcfml_email_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_email = jQuery(this).val();
                    if ( rtwwcfml_email_req == 'true' ) 
                    {
                        if (rtwwcfml_email == '' || rtwwcfml_IsEmail(rtwwcfml_email) == false) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                    }                    
                });
                rtwwcfml_Obj.find('input.wpcf7-number[type="number"]').each(function(){
                    var rtwwcfml_num_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_num = parseInt(jQuery(this).val());
                    var rtwwcfml_min = parseInt(jQuery(this).attr('min'));
                    var rtwwcfml_max = parseInt(jQuery(this).attr('max'));
                    if ( rtwwcfml_num_req == 'true' ) 
                    {
                        if ( rtwwcfml_num == '' ) 
                        {                       
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                        if ( rtwwcfml_max ) 
                        {
                            if ( rtwwcfml_num > rtwwcfml_max ) 
                            {
                                jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                                jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                                jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                                jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                                rtwwcfml_error = true;
                                return false;
                            }
                        }
                        if ( rtwwcfml_min ) 
                        {
                            if ( rtwwcfml_num < rtwwcfml_min ) 
                            {
                                jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                                jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                                jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                                rtwwcfml_error = true;
                                return false;
                            }
                        }
                    }
                });
                rtwwcfml_Obj.find('input.wpcf7-date[type="date"]').each(function(){
                    var rtwwcfml_date_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_date = jQuery(this).val();
                    var rtwwcfml_min_date = jQuery(this).attr('min');
                    var max_datemax_date = jQuery(this).attr('max');
                    if ( rtwwcfml_date_req == 'true' ) 
                    {
                        if ( rtwwcfml_date == '' ) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                        if ( rtwwcfml_min_date ) 
                        {
                            if ( rtwwcfml_date < rtwwcfml_min_date ) 
                            {
                                jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                                jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                                jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                                jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                                rtwwcfml_error = true;
                                return false;
                            }
                        }
                        if ( max_datemax_date ) 
                        {
                            if ( rtwwcfml_date > max_datemax_date ) 
                            {
                                jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                                jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                                jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                                jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                                rtwwcfml_error = true;
                                return false;
                            }
                        }
                    }
                });
                rtwwcfml_Obj.find('input.wpcf7-text.wpcf7-url[type="url"]').each(function(){
                    var rtwwcfml_url_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_url = jQuery(this).val();
                    if ( rtwwcfml_url_req == 'true' ) 
                    {
                        if ( rtwwcfml_url == '' ) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                        if ( !rtwwcfml_isValidUrl(rtwwcfml_url) ) 
                        {
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500,className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                    }
                });
                rtwwcfml_Obj.find('input.wpcf7-text.wpcf7-tel[type="tel"]').each(function(){
                    var rtwwcfml_tel_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_phone = jQuery(this).val();
                    if ( rtwwcfml_tel_req == 'true' ) 
                    {
                        if ( rtwwcfml_phone == '' ) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                        if ( !rtwwcfml_valid_tel_number(rtwwcfml_phone) ) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                    }
                });
                rtwwcfml_Obj.find('select.wpcf7-select').each(function(){
                    var rtwwcfml_select_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_select_multipl = jQuery(this).attr('multiple');
                    var rtwwcfml_select = jQuery(this).val();
                    if ( rtwwcfml_select_req == 'true' ) 
                    {
                        if ( rtwwcfml_select == '' ) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                        if ( rtwwcfml_select_multipl == 'multiple' ) 
                        {
                            if ( rtwwcfml_select.length === 0 ) 
                            {
                                jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                                jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                                jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                                rtwwcfml_error = true;
                                return false;
                            }
                        }
                    }
                });
                rtwwcfml_Obj.find('textarea.wpcf7-textarea').each(function(){
                    var rtwwcfml_textarea_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_textarea = jQuery(this).val();
                    if ( rtwwcfml_textarea_req == 'true' ) 
                    {
                        if( rtwwcfml_textarea == '' )
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                    }
                });
                rtwwcfml_Obj.find('.wpcf7-checkbox.wpcf7-validates-as-required').each(function(){
                    var rtwwcfml_ckecked = false;
                    jQuery(this).find('input[type="checkbox"]').each(function(){
                        if ( jQuery(this).prop('checked')==true ) 
                        {
                           rtwwcfml_ckecked = true;
                        }
                    });
                    if ( rtwwcfml_ckecked == false ) 
                    {
                        jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                        jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                        jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                        jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                        rtwwcfml_error = true;
                        return false;
                    }
                });
                rtwwcfml_Obj.find('input.wpcf7-file[type="file"]').each(function(){
                    var rtwwcfml_file_req = jQuery(this).attr('aria-required');
                    var rtwwcfml_accepted_file = jQuery(this).attr('accept');
                    var rtwwcfml_file = jQuery(this).val();
                    if ( rtwwcfml_file_req == 'true' ) 
                    {
                        if ( rtwwcfml_file == '' ) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                        if ( rtwwcfml_accepted_file.split(',').indexOf('.'+jQuery(this).val().split('.').pop().toLowerCase()) == -1 ) 
                        {
                            jQuery(document).find('.rtwwcfml_next_note').notify(rtwwcfml_ajax_param.rtwwcfml_err_msg,{'autoHideDelay':1500, className:'rtwwcfml_text_notify',position:"left"});
                            jQuery(document).find('.notifyjs-bootstrap-rtwwcfml_text_notify').prepend('<i class="fa fa-info-circle" aria-hidden="true"></i>');
                            jQuery(document).find("."+rtwwcfml_nxt_div).hide();
                            jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).show();
                            rtwwcfml_error = true;
                            return false;
                        }
                    }
                });

                if ( rtwwcfml_error == false ) 
                {
                    jQuery(document).find(".rtwwcfml-steps"+(rtwwcfml_prev_div[2])).addClass('active');
                    jQuery(document).find("."+rtwwcfml_nxt_div).show();
                    if ( rtwwcfml_style_type == 1 ) {
                        jQuery(document).find(".rtwwcfml-steps"+(rtwwcfml_prev_div[2]-1)).removeClass( 'active');
                    }
                    jQuery(document).find(".rtwwcfml-tab-"+(rtwwcfml_prev_div[2]-1)).hide();
                    jQuery(document).find('.rtwwcfml_step_by_step-item').each(function(){
                        if($(this).hasClass('active') && rtwwcfml_count == 0)
                        {
                            rtwwcfml_count++;
                            rtwwcfml_positions = $(this).position();  
                        }
                    });

                    if(rtwwcfml_style_type == 4)
                    {
                        console.log();
                        jQuery(document).find(".rtwwcfml_tab_"+(rtwwcfml_prev_div[2])).addClass('rtwwcfml_active_number');
                        jQuery(document).find(".rtwwcfml_tab_"+(rtwwcfml_prev_div[2]-1)).removeClass('rtwwcfml_active_number');
                        jQuery(document).find(".rtwwcfml_tab_"+(rtwwcfml_prev_div[2]-1)).addClass('rtwwcfml_completed_action');
                        jQuery(document).find("#rtwwcfml_tab_"+(rtwwcfml_prev_div[2]-1)).hide();
                        jQuery(document).find(".rtwwcfml_tab_icon_"+(rtwwcfml_prev_div[2]-1)).show();
                    }

                    $('.rtwwcfml_step_by_step_move').css("left",  rtwwcfml_positions.left);
                }
            }
        });

        jQuery('.wpcf7-submit').on('click', function() {
            var rtwwcfml_wpcf7Form = document.querySelector('.wpcf7')
            rtwwcfml_wpcf7Form.addEventListener('wpcf7mailsent', function(rtwwcfml_event) {
                jQuery(document).find(".rtwwcfml_prev").hide();
            }, false);
        });
	});


})( jQuery );

function rtwwcfml_IsEmail(rtwwcfml_user_email) 
{
    var rtwwcfml_email_regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!rtwwcfml_email_regex.test(rtwwcfml_user_email)) 
    {
        return false;
    }else{
        return true;
    }
}

function rtwwcfml_isValidUrl(rtwwcfml_url)
{
    var rtwwcfml_url_regex = /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;
    if(rtwwcfml_url_regex.test(rtwwcfml_url)) 
    {
      return true;
    } 
    else 
    {
      return false;
    }   
}
function rtwwcfml_move_selector(rtwwcfml)
{
    var rtwwcfml_positions = '';
    var rtwwcfml_cnt = 0;
    jQuery(document).find('.rtwwcfml_step_by_step-item').each(function(){
        if(jQuery(this).hasClass('active') && rtwwcfml_cnt == 0)
        {
            rtwwcfml_cnt++;
            rtwwcfml_positions = jQuery(this).position(); 
        }
    });
    jQuery('.rtwwcfml_step_by_step_move').css("left",  rtwwcfml_positions.left);
}

function rtwwcfml_valid_tel_number(rtwwcfml_tel)
{
    var rtwwcfml_tel_regex = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
    var rtwwcfml_regex = new RegExp(rtwwcfml_tel_regex);
    if(rtwwcfml_regex.test( rtwwcfml_tel )) 
    {
      return true;
    } 
    else 
    {
      return false;
    }   
}