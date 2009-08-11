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
	<br />
	<?php echo elgg_echo('login_redirector:admin:custom_redirect'); ?><br />
	<input type="text" name="params[custom_redirect]" 
          value="<?php echo $vars['entity']->custom_redirect; ?>"/>
        <br />

	<?php echo elgg_echo('login_redirector:admin:custom_redirect_info'); ?>
	<br />
	[wwwroot] = <?php echo $CONFIG->wwwroot; ?><br />
	[username] = <?php echo get_loggedin_user()->username;?>
</p>