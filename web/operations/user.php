<?php
	require_once("../settings/global.php");

	class User {
		private $userid;
		private $imageid;
		private $firstname;
		private $lastname;
		private $email;
		private $password;

		public function __construct($new_userid, $new_imageid, $new_firstname, $new_lastname, $new_email, $new_password) {
			$this->userid = $new_userid;
			$this->imageid = $new_imageid;
			$this->firstname = $new_firstname;
			$this->lastname = $new_lastname;
			$this->email = $new_email;
			$this->password = $new_password;
		}

		public function getUserId($new_userid) 		{ return $this->userid; 	}
		public function getImageId($new_imageid) 	{ return $this->imageid; 	}
		public function getFirstName($new_firstname){ return $this->firstname; 	}
		public function getLastName($new_lastname) 	{ return $this->lastname; 	}
		public function getEmail($new_email) 		{ return $this->email; 		}
		public function getPassword($new_password) 	{ return $this->password; 	}

		public function setUserId($new_userid) 		{ $this->userid 	= $new_userid; 		}
		public function setImageId($new_imageid) 	{ $this->imageid 	= $new_imageid; 	}
		public function setFirstName($new_firstname){ $this->firstname 	= $new_firstname; 	}
		public function setLastName($new_lastname) 	{ $this->lastname 	= $new_lastname; 	}
		public function setEmail($new_email) 		{ $this->email 		= $new_email; 		}
		public function setPassword($new_password) 	{ $this->password 	= $new_password; 	}
	}

	class UserOperations {

		public static function DeleteUser($userid) {
			if($userid === null) {
				return new QueryResult(false, "'userid' cannot be null.", null);
			} else {
				$query = "DELETE FROM user WHERE UserId = '$userid';";
				return query_result($query);
			}
		}

		public static function CreateUser($firstname, $lastname, $email, $password) {
			if($firstname === null || $lastname === null || $email === null || $password === null) {
				return new QueryResult(false, "No parameter may be null.", null);
			} else {
				$query = "INSERT INTO user (FirstName, LastName, Email, Password) VALUES ('$firstname', '$lastname', '$email', '$password');";
				$result = query_result($query);
				if($result->isSuccess) {
					return Account::Login($result->rows[0]["userid"]);
				} else {
					return $result;
				}
			}
		}

		public static function GetUser($userid) {
			if($userid === null) {
				return new QueryResult(false, "'userid' cannot be null.", null);
			} else {
				$query = "SELECT * FROM user WHERE UserId = '$userid';";
				return query_result($query);
			}
		}

		public static function GetUsers($filters) {
			$query = "SELECT * FROM user";
			if($filters != null && count($filters) > 0) {
				$query .= " WHERE ";
				for($i = 0; $i < count($filters); $i++) {
					$query .= $filters[$i]["key"] . " = '" . $filters[$i]["value"] . "'";
					if($i + 1 < count($filters)) {
						$query .= " AND ";
					}
				}
			}
			return query_result($query);
		}

		public static function UpdateUser($userid, $user) {
			if($userid === null || $userid == "") {
				return new QueryResult(false, "User parameter is null or empty.", null);
			}

			$result = $this->GetUser($userid);
			if ($result->isSuccess == false) {
				return new QueryResult(false, "User does not exist.", null);
			}

			$previousFieldAdded = false;
			$query = "UPDATE user SET ";

			if($user->getImageId() !== null) {
				if($previousFieldAdded) { $query .= ", "; }
				$query .= "ImageId = '" . $user["imageid"] . "'";
				$previousFieldAdded = true;
			}

			if($user->getFirstName() !== null) {
				if($previousFieldAdded) { $query .= ", "; }
				$query .= "FirstName = '" . $user["firstname"] . "'";
				$previousFieldAdded = true;
			}

			if($user->getLastName() !== null) {
				if($previousFieldAdded) { $query .= ", "; }
				$query .= "LastName = '" . $user["lastname"] . "'";
				$previousFieldAdded = true;
			}

			if($user->getEmail() !== null) {
				if($previousFieldAdded) { $query .= ", "; }
				$query .= "Email = '" . $user["email"] . "'";
				$previousFieldAdded = true;
			}

			if($user->getPassword() !== null) {
				if($previousFieldAdded) { $query .= ", "; }
				$query .= "Password = '" . $user["password"] . "'";
				$previousFieldAdded = true;
			}

			$query .= " WHERE UserId = '" . $userid . "';";
			return query_result($query);
		}
	}

?>
