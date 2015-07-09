<?php
	
	if (isset($_GET['email']) && isset($_GET['password'])) {
	    //echo $_GET['email'];
	    //echo $_GET['password'];
	}else if (isset($_GET['returnURL'])){
		header("Location: " . $_GET['returnURL']);
	} else {
		//header("Location: /login");
	}


	header("Location: /home");

	/*
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$conn = new mysqli($server, $username, $password, $db);

	$result = $conn->query("SELECT * FROM user WHERE Email = '$_GET['email']' AND Password = $_GET['password']");

	while($row = $result->fetch_row());
	{
		$rows[]=$row;
	}

	$result->close();
	$conn->close();
	header("Location: /home?user=" . $rows[0]);

    //Get the private context 
    session_name('Private'); 
    session_start(); 
    $private_id = session_id(); 
    $b = $_SESSION['pr_key']; 
    session_write_close();

	*/
?>