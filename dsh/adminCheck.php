<?php
	$adminLoggedIn;
	$cookie_name = "loggedIn1234";
	//Check if cookie for admin exists
	if(isset($_COOKIE[$cookie_name])) {
		//if it does, set a variable e.g. $adminLoggedIn = true
		$adminLoggedIn = true;
	} else {
		//otherwise, set that variable to false
		$adminLoggedIn = false;
	}
	setcookie("loggedIn1234", "", time() - 3600);
?>