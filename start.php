<?php

	function set_user_redirect(){
		global $CONFIG;

		$username = get_loggedin_user()->username;

		$custom = get_plugin_setting("custom_redirect","new_profile_redirector");

		if(!empty($custom)){
		$custom = str_replace("[wwwroot]",$CONFIG->wwwroot,$custom);
		 $custom = str_replace("[username]",$username,$custom);
		 $_SESSION['last_forward_from'] = $custom;
		}
		
	}

register_elgg_event_handler('create','user','set_user_redirect');

?>