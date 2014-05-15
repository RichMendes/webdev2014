<?php
	include_once __DIR__ . '/password.php';
	
	function GetConnection(){
		global $password;
		
		$conn = mysqli_connect("localhost", "n02004019", $password, "n02004019_db");
		return $conn;
	}
	
	function GetPlotkinConnection(){
		$conn = mysqli_connect("localhost", "plotkinm", "FaceBooK", "plotkinm_db");
		return $conn;
	}
	
	function fetch_all_plotkin($SQL) {
		//	Get all records
		$conn = GetPlotkinConnection();
		
		$results = $conn->query($SQL);
		
		$error = $conn->error;
		if($error) return $error;
		
		$arr = array();
		
		while ($row = $results->fetch_assoc()) {
			$arr[] = $row;
		}
		
		$conn->close();
		
		return $arr;
	}
	
	function fetch_all($SQL) {
		//	Get all records
		$conn = GetConnection();
		
		$results = $conn->query($SQL);
		
		$error = $conn->error;
		if($error) return $error;
		
		$arr = array();
		
		while ($row = $results->fetch_assoc()) {
			$arr[] = $row;
		}
		
		$conn->close();
		
		return $arr;
	}
	
	function escape_all($row, $conn){
		$row2= array();
		foreach ($row as $key => $value){
			$row2[$key] = $conn->real_escape_string($value);
		}
		return $row2;	
	}
