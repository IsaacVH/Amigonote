<?php

	// Database info
	class Database {
		public $server;
		public $username;
		public $password;
		public $db;

		public function __construct() {
			$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
			$this->server = array_key_exists("host", $url) ? $url["host"] : "localhost";
			$this->username = array_key_exists("user", $url) ? $url["user"] : "root";
			$this->password = array_key_exists("pass", $url) ? $url["pass"] : "";
			$this->db = array_key_exists("path", $url) && $url["path"] != "" ? substr($url["path"], 1) : "heroku_b01bc1abd955627";
		}
	}

	class QueryResult {
		public $isSuccess;
		public $error_message;
		public $rows;

		public function __construct($new_success, $new_error, $new_rows) {
			$this->isSuccess = $new_success;
			$this->error_message = $new_error;
			$this->rows = $new_rows;
		}
	}

	// Retrieve Data from Database
	function query_result($query) {
		$database = new Database();
		$conn = new mysqli($database->server, $database->username, $database->password, $database->db);

		$final_result = new QueryResult(true, null, null);

		// Check connection
		if( !$conn->connect_errno && !$conn->error) {

			// Query
			$result = mysqli_query($conn, $query);

			echo $query . "<br />";

			if ($result === FALSE) { 
				$final_result = new QueryResult(false, mysqli_connect_error(), null); 
			} else {
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$result_rows[] = $row;
					}
				} else {
					$final_result = new QueryResult(false, "0 results", null);
				}
			}
			
		} else {
			file_put_contents("log.txt", $mysqli->error, FILE_APPEND);
		    $final_result = new QueryResult(false, "Connection failed: " . $conn->connect_error, null);
		}

		$conn->close();

		if($final_result->isSuccess) {
			return new QueryResult(true, null, $result_rows);
		} else {
			return $final_result;
		}
	}

?>
