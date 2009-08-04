<?php
	/**
	* Login Redirector
	* 
	* @package login_redirector
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	global $CONFIG;
	
?>
<p>
	<?php echo elgg_echo('login_redirector:admin:config'); ?>
	
	<select name="params[redirectpage]">
		<option value="dashboard" <?php if ($vars['entity']->redirectpage == 'dashboard') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('login_redirector:admin:option:dashboard'); ?></option>
		<option value="profile" <?php if ($vars['entity']->redirectpage == 'profile') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('login_redirector:admin:option:profile'); ?></option>
		<option value="custom" <?php if ($vars['entity']->redirectpage == 'custom') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('login_redirector:admin:option:custom_redirect'); ?></option>
		
	</select>
	
</p>
<p>
	<?php echo elgg_echo('login_redirector:admin:useroverride'); ?>
	
	<select name="params[useroverride]">
		<option value="no" <?php if ($vars['entity']->useroverride != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
		<option value="yes" <?php if ($vars['entity']->useroverride == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>		
	</select>
</p>

<p>
	<br />
	<?php echo elgg_echo('login_redirector:admin:custom_redirect'); ?><br />
	<input type="text" name="params[custom_redirect]" value="<?php echo $vars['entity']->custom_redirect; ?>"/><br />
	<?php echo elgg_echo('login_redirector:admin:custom_redirect_info'); ?>
	<br />
	[wwwroot] = <?php echo $CONFIG->wwwroot; ?><br />
	[username] = <?php echo get_loggedin_user()->username;?>
</p>