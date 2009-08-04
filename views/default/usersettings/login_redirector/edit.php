<?php
	/**
	* Login Redirector
	* 
	* @package login_redirector
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/
	
	if(get_plugin_setting("useroverride","login_redirector") == "yes" && get_plugin_setting("redirectpage","login_redirector") != "custom"){
?>
<p>
	<?php echo elgg_echo('login_redirector:user:config'); ?>
	
	<select name="params[redirectpage]">
		<option value="dashboard" <?php if ($vars['entity']->redirectpage == 'dashboard') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('login_redirector:admin:option:dashboard'); ?></option>
		<option value="profile" <?php if ($vars['entity']->redirectpage == 'profile') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('login_redirector:admin:option:profile'); ?></option>
		
	</select>
	
</p>
<?php
	}
?>