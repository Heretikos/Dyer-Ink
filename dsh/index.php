<?php

	//import template to check if admin is logged in
	require "adminCheck.php";
	setcookie("loggedIn1234","",time()-3600);
	
	if($adminLoggedIn) {
		//if they are, welcome them, echo headers for full admin page
		echo "admin is logged in!<br />";
		
		//Then echo the three buttons and information about last login date and IP
		
	} else {
		//if they aren't, include the login form with all its glorious headers
		require "adminlogin.php";
	}
	
?>