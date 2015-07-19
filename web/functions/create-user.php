<?php

	require_once("../settings/config.php");
	require_once("../operations/user.php");
	
	if (isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['email']) && isset($_GET['password'])) {
		UserOperations::CreateUser($_GET['firstname'], $_GET['lastname'], $_GET['email'], $_GET['password']);
		header("Location: /contacts");
	}else {
		if (isset($_GET['returnURL'])) {
			header("Location: /signup?returnURL=" . $_GET['returnURL']);
		}
		header("Location: /signup");
	}
?>