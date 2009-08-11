<?php

function perform_redirect(){
  global $CONFIG;
  
  $username = get_loggedin_user()->username;
  
  $custom = get_plugin_setting("custom_redirect","new_profile_redirector");
  
  if(!empty($_SESSION['profile_is_new']) && !empty($custom)){
    $custom = str_replace("[wwwroot]",$CONFIG->wwwroot,$custom);
    $custom = str_replace("[username]",$username,$custom);

    unset($_SESSION['profile_is_new']);

    forward($custom);
  }
  
}

function set_session_flag() {
  $_SESSION['profile_is_new'] = 1;
}

register_elgg_event_handler('create','user','set_session_flag');
register_elgg_event_handler('profileupdate', 'user', 'perform_redirect');

?>
