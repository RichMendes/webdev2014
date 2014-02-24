<?php
	include_once __DIR__ . '/password.php';
	
	function GetConnection(){
		global $password;
		
		$conn = mysqli_connect("localhost", "n02004019", $password, "n02004019_db");
		return $conn;
	}
