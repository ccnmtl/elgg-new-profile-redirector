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
				if($useroverride == 'yes' && get_plugin_setting("redirectpage","login_redirector") != "custom"){
					$userpref = get_plugin_usersetting("redirectpage","login_redirector");
					if($userpref){
						if($userpref == 'profile'){
							$username = get_loggedin_user()->username;
							$_SESSION['last_forward_from'] = "pg/profile/" . $username;
						}
					} else {
						redirectAdmin();
					}
				} else {
					redirectAdmin();
				}
				
			}
		}
	}
	
	function redirectAdmin(){
		global $CONFIG;
		$pref = get_plugin_setting("redirectpage","login_redirector");
		$username = get_loggedin_user()->username;
		if($pref == "profile"){
			$_SESSION['last_forward_from'] = "pg/profile/" . $username;
		} elseif($pref == "custom"){
			$custom = get_plugin_setting("custom_redirect","login_redirector");
			
			if(!empty($custom)){
				$custom = str_replace("[wwwroot]",$CONFIG->wwwroot,$custom);
				$custom = str_replace("[username]",$username,$custom);
				$_SESSION['last_forward_from'] = $custom;
				$_SESSION['after_profile_update'] = 'http://nytimes.com';
			}
		}
							
	}

function redirect_after_profileupdate($event, $object_type, $user) {
    if(!empty($_SESSION['after_profile_update'])) {
  //elgg_alert("Foo!");
      //  }
        $next = $_SESSION['after_profile_update'];
	unset($_SESSION['after_profile_update']);
        forward($next);
    }
}

	register_elgg_event_handler('create','user','login_redirector_init');
        register_elgg_event_handler('profileupdate','user','redirect_after_profileupdate');
?>