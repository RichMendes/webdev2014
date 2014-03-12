<?php
		include_once __DIR__ . '/../inc/functions.php';		//propper absolute path
		
		class Contacts {
			//	CRUD (Create, Read/Get, Update, Delete)
			static public function Get($id = null) {	//	If $id is given a value it will be set to that if nothing is given it will be set to null
				if($id == null) {
					//	Get all records
					$sql = "SELECT U.*, K.Name as UserType_Name 
					        FROM 2014Spring_Users U Join 2014Spring_Keywords K ON U.UserType = K.id
					       ";
					return fetch_all($sql);
				}
				else {
					//	Get one record
				}
			}
			
			static public function Create($row) {
				$conn = GetConnection();
				$sql = "";
				$results = $conn->query($sql);
				$conn->close();
				
				return $arr;
			}
			
			static public function Blank()
			{
				return array('id' => null);
			}
			
			static public function Update($row) {
				
			}
			
			static public function Delete($id) {
				
			}
			
			static public function Validate($row) {
				
			}
		}
