<?php

class Alert {

	function Create($text) {
		$_SESSION["alert"] = ["has-alert" => true, "text" => $text];
	}

	function Remove() {
		$_SESSION["alert"] = ["has-alert" => false, "text" => null];
	}
}

?>