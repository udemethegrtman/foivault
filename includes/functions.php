<?php
/**
* redirect 
* @param $link
* Argument variable for where link should be redirected
*/
function redirect($link){
	header('Location:'.$link);
}

/**
* view_access -> separates views for privileged users from normal users
* @author bl4ckdu5t
* @param $global -> Values for normal users
* @param $user_specific For privileged users
*/
function view_access($global, $user_specific){
	if (isset($_SESSION['user_id'])) {
		return $user_specific;
	}else{
		return $global;
	}
}