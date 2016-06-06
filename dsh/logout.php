<?php

	$title = "Logging out";
	include "adminHeaders.php";

	setcookie("loggedIn1234", "do not care", time() - (86400 * 30), "/");

	//accounce that the login was successful
	echo "<h1>Logout successful!</h1>";
	
	//redirect with javascript
	echo "<script>window.location.href='index.php';</script>";
	
	include "adminFooter.php";

?>