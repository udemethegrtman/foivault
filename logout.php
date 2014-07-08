<?php
	/* Logout Script */
	//name of my session in use
	session_name('foivault');

	//Locate the session
	session_start();

	//Unset the session variables
	session_unset();

	// Destroy the session cookie
	if(isset($COOKIE[session_name()])){
		setcookie(session_name(), '', time()-4200, '/');
	}

	// Destroy the session
	session_destroy();

	header('Location:index.php');
?>
