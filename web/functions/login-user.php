<?php

	require_once("../settings/config.php");
	require_once("../operations/account.php");
	
	if (!isset($_GET['email']) || !isset($_GET['password'])) {
		header("Location: /login?error=Email/Password%20Was%20Not%20Filled%20Out");
	}

	$result = Account::Login($_GET['email'], $_GET['password']);

	if($result) {
	    if (isset($_GET['returnURL'])){
			header("Location: " . $_GET['returnURL']);
		} else {
			header("Location: /contacts");
		}
	} else {
		header("Location: /login?error=Login%20Failed");
	}

?>