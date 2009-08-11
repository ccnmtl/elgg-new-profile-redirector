<?php
	/**
	* Login Redirector
	* 
	* @package login_redirector
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/
	
	function login_redirector_init()	{
		
		if(is_plugin_enabled("profile") && empty($_SESSION['last_forward_from'])){
			$useroverride = get_plugin_setting("useroverride","login_redirector");
			if($useroverride){
			  redirectAdmin();
			}
		}
        }
	
	function redirectAdmin(){
		global $CONFIG;
		$pref = get_plugin_setting("redirectpage","login_redirector");
		$username = get_loggedin_user()->username;
		if($pref == "custom"){
			$custom = get_plugin_setting("custom_redirect","login_redirector");
			
			if(!empty($custom)){
				$custom = str_replace("[wwwroot]",$CONFIG->wwwroot,$custom);
				$custom = str_replace("[username]",$username,$custom);
				$_SESSION['last_forward_from'] = $custom;
			}
		}
							
	}

function redirect_after_profileupdate($event, $object_type, $user) {
  register_elgg_event_handler('login','user','login_redirector_init');
?>