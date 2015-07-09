<?php

	$mysqlnd = function_exists('mysqli_fetch_all');

	if ($mysqlnd) {
	    echo 'mysqlnd enabled <br/>';
	}

	
	if (isset($_GET['email']) && isset($_GET['password'])) {
	    echo $_GET['email'];
	    echo $_GET['password'];
	}else if (isset($_GET['returnURL'])){
		header("Location: " . $_GET['returnURL']);
	} else {
		//header("Location: /login");
	} 



	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	var_dump($url);

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);


    phpinfo();

    /*
    //Get the private context 
    session_name('Private'); 
    session_start(); 
    $private_id = session_id(); 
    $b = $_SESSION['pr_key']; 
    session_write_close();
	*/
?>