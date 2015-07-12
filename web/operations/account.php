<?php

	require_once("../settings/global.php");
	require_once("user.php");

	class Account {
		public static function Login($email, $password) {

			$filters = [["key" => "Email", "value" => $email], ["key" => "Password", "value" => $password]];
			$result = UserOperations::GetUsers($filters);
			if ($result->isSuccess) {

			    //Get the private context 
			    //session_name('UserLoggedIn'); 
			    session_start();
			    $_SESSION['user'] = $result->rows[0];

			} else {
				return false;
			}

			return true;
		}

		public static function Logout() {

		}
	}

?>

