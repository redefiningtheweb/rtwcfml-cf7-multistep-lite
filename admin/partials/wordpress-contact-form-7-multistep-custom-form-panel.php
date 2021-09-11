<h2><?php echo esc_html('Form', 'rtwcfml-cf7-multistep-lite'); ?></h2>
<div class="">
	<table class="wp-list-table form-table rtw-table">
		<tr>
			<th><?php esc_html_e('Enable Multistep', 'rtwcfml-cf7-multistep-lite'); ?></th>
			<td>
				<input type="checkbox" id="rtwwcfml_enbl_mltstp" name="rtwwcfml_enable_multstp" value="1" <?php if ($rtwwcfml_mltstp == 1) {
					echo esc_html("checked=checked");
				} ?> />
				<input id='rtwwcfml_enable_multstp' type='hidden' value="<?php if($rtwwcfml_mltstp){ echo esc_attr($rtwwcfml_mltstp); }else{ echo '0'; } ?>" name='rtwwcfml_multstp_enable'>
			</td>
		</tr>
		<tr id="rtwwcfml_select_form_style" class="wp-list-table form-table rtw-table <?php if ($rtwwcfml_mltstp == 0) {
			echo esc_attr('rtwwcfml_hide');
		} ?>">
			<th><label><strong><?php esc_html_e("Select Multistep Style", 'rtwcfml-cf7-multistep-lite') ?></strong>: </label>
			</th>
			<td>
				<select name="rtwwcfml_multistep_type" class="rtwwcfml_multistep_type">
					<option <?php if ($rtwwcfml_mltstp_type == 0 || $rtwwcfml_mltstp_type === NULL) {
						echo esc_html("selected=selected");
					} ?> value="1"><?php esc_html_e("None", 'rtwcfml-cf7-multistep-lite') ?></option>
					<option <?php if ($rtwwcfml_mltstp_type == 1) {
						echo esc_html("selected=selected");
					} ?> value="1"><?php esc_html_e("Style 1", 'rtwcfml-cf7-multistep-lite') ?></option>
					<option <?php if ($rtwwcfml_mltstp_type == 2) {
						echo esc_html("selected=selected");
					} ?> value="2"><?php esc_html_e("Style 2", 'rtwcfml-cf7-multistep-lite') ?></option>
					<option <?php if ($rtwwcfml_mltstp_type == 3) {
						echo esc_html("selected=selected");
					} ?> value="3"><?php esc_html_e("Style 3", 'rtwcfml-cf7-multistep-lite') ?></option>
					<option <?php if ($rtwwcfml_mltstp_type == 4) {
						echo esc_html("selected=selected");
					} ?> value="4"><?php esc_html_e("Style 4", 'rtwcfml-cf7-multistep-lite') ?></option>
				</select>
			</td>
		</tr>
</table>
</div>
<div id="rtwwcfml_hide_form_panel" class="<?php if ($rtwwcfml_mltstp == 1) {
	echo esc_attr('rtwwcfml_hieght_auto');
	} else {
		echo esc_attr('rtwwcfml_hieght_null');
	} ?>">
	<div class="rtwwcfml_tab_wrapper">
		<nav class="rtwwcfml_mltstp_nav rtwwcfml_ticket_tabs">
			<div class="rtwwcfml_move_selector"></div>
			<?php
				wp_deregister_script("wpcf7-admin-taggenerator");
				wp_enqueue_script("rtwwcfml-tag-generator", RTWCFML_URL . 'admin/js/rtwwcfml-tag-generator.js', array('jquery', 'thickbox', 'wpcf7-admin'), $this->rtwcfml_version, true);
				$rtwwcfml_ajax_nonce = wp_create_nonce("rtwwcfml-ajax-security-string");
				$rtwwcfml_translation_array 	= array(
					'rtwwcfml_ajaxurl' 	=> esc_url(admin_url('admin-ajax.php')),
					'rtwwcfml_nonce' 	=> $rtwwcfml_ajax_nonce,
					'enable_mltistep'   => $rtwwcfml_mltstp
				);
			wp_localize_script("rtwwcfml-tag-generator", 'rtwwcfml_ajax_param', $rtwwcfml_translation_array);
			$default_steps = $this->rtwwcfml_default_form_steps($rtwwcfml_post->id());
			$count = 1;
			$step = 1;
			foreach ($default_steps as $key => $val) {
				if ($step == 1) {
					$class = 'rtwwcfml_ticket_tab_active';
				} else {
					$class = '';
				}
				?>
				<a contenteditable="true" name="rtwwcfmlstep_name_<?php echo esc_attr($count); ?>" data-tab="rtwwcfml_step_tab<?php echo esc_attr($count); ?>" class="rtwwcfml_name rtwwcfml_steps <?php echo esc_attr($class);
				echo " rtwwcfml_steps_name-{$count}" ?>" href="#"><?php esc_html_e($key, 'rtwcfml-cf7-multistep-lite'); ?>
				<?php
					if ( $count > 3 ) { ?>
						 <i class="fas fa-times-circle rtwwcfml_close_btn rtwwcfml_remove_step" data-rtwwcfml_step_id="<?php echo esc_attr($count); ?>"></i>
				<?php	}
				?>
				<input type="hidden" name="rtwwcfml_step_name[]" title="text" value="<?php echo esc_attr($key); ?>" />
			</a>
			<?php $count++;
			$step++;
		}
		?>
		<input type="hidden" class="rtwwcfml_stripe_clor" name="rtwwcfml_stripe_clor" title="text" value="" />
		<input type="hidden" class="rtwwcfml_tab_font" name="rtwwcfml_tab_font" title="text" value="" />
		<input type="hidden" class="rtwwcfml_tab_color" name="rtwwcfml_tab_color" title="text" value="" />
		<input type="hidden" class="rtwwcfml_nxt_btn_txt" name="rtwwcfml_nxt_btn_txt" title="text" value="" />
		<input type="hidden" class="rtwwcfml_nxt_prvs_txt" name="rtwwcfml_nxt_prvs_txt" title="text" value="" />
		<input type="hidden" class="rtwwcfml_nxt_btn_color" name="rtwwcfml_nxt_btn_color" title="text" value="" />
		<input type="hidden" class="rtwwcfml_previous_btn_color" name="rtwwcfml_previous_btn_color" title="text" value="" />
		<input type="hidden" class="rtwwcfml_active_btn_color" name="rtwwcfml_active_btn_color" title="text" value="" />
		<input type="hidden" class="rtwwcfml_strip_color" name="rtwwcfml_strip_color" title="text" value="" />
	</nav>
	<a class="rtwwcfml_step_add tooltip" id="rtwwcfml_tooltip" data-nxt_tab="<?php echo esc_attr($count); ?>" href="#"><i class="fa fa-plus"></i>
		 <span class="tooltiptext"><?php esc_html_e('User can add maximum 6 steps.', 'rtwcfml-cf7-multistep-lite');?></span>
	</a>
</div>
<div class="rtwwcfml_step_div">
	<?php
	$count = 1;
	foreach ($default_steps as $k => $val) { ?>
		<div class="rtwwcfml_main_div rtwwcfml_step_tab<?php echo esc_attr($count);
		if ($count != 1) {
			echo " hidden";
		} ?>">
		<div class="rtwwcfml_second_div">
			<textarea name="rtwwcfml_steps_value[]" id="wpcf7-form" cols="100" rows="24" class="rtwwcfml_class large-text code <?php if ($count == 1) { echo 'text_active'; } ?>" data-count="<?php echo esc_attr($count); ?>" data-config-field="form.body"><?php echo wp_kses_post($val); ?></textarea>
		</div>
	</div>
	<?php $count++;
}
?>
</div>
</div>

<textarea id="wpcf7-form" name="wpcf7-form" cols="100" rows="24" class="large-text code wpcf7_textarea <?php if ($rtwwcfml_mltstp == 1) { echo "rtwwcfml_hidden_table rtwwcfml_text"; } ?> rtwwcfml_custom_class" data-config-field="form.body" data-custom="custom"><?php echo wp_kses_post($rtwwcfml_post->prop('form')); ?>
</textarea>