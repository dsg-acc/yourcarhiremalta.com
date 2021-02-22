<?php
if (isset($tpl['arr']) && !empty($tpl['arr']))
{
    ?>
	<form action="" method="post" class="">
		<input type="hidden" name="send_sms" value="1" />
		<input type="hidden" name="id" value="<?php echo $tpl['arr']['id']; ?>" />
		<?php if (!empty($tpl['arr']['to'])) : ?>
		<div class="form-group">
			<label class="control-label"><?php __('booking_phone'); ?></label>
	
			<input type="text" name="to" class="form-control required" value="<?php echo pjSanitize::html($tpl['arr']['to']); ?>" data-msg-required="<?php __('plugin_base_this_field_is_required');?>"/>
		</div>
		<?php endif; ?>
		<div class="form-group">
			<label class="control-label"><?php __('booking_message');?></label>
			<div id="crMessageEditorWrapper">
				<textarea name="message" class="form-control required" rows="8" data-msg-required="<?php __('plugin_base_this_field_is_required');?>"><?php echo stripslashes(str_replace(array('\r\n', '\n'), '&#10;', $tpl['arr']['message'])); ?></textarea>
			</div>			
		</div>
	</form>
	<?php
}else{
    ?>
    <div id="pjResendSmsAlert" class="alert alert-warning">
   		<?php __('lblSmsNotificationNotSet')?>
    </div>
    <?php    
}
?>