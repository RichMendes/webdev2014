<?php
		include_once __DIR__ . '/../inc/functions.php';		//propper absolute path
		
		class Products {
			//	CRUD (Create, Read/Get, Update, Delete)
			static public function Get($id = null, $category_id = null) {	//	If $id is given a value it will be set to that if nothing is given it will be set to null
				$sql = "SELECT *
							FROM 2014Spring_Products
					       ";
				
				if($id){
				// Get one record
					$sql .= " WHERE id = $id ";
					if(($results = fetch_all($sql)) && count($results) > 0){
						return $results[0];
					}else{
						return null;
					}
				}elseif($category_id){
					$sql .= " WHERE Catergory_Keyword_id = $category_id ";
					return fetch_all($sql);
				}else{
					//	Get all records
					return fetch_all($sql);
				}
			}

			static public function GetCategories()
			{
				$sql = "SELECT id, Name FROM 2014Spring_Keywords WHERE Parent_id = 13";
				return fetch_all($sql);
			}
			
			static public function Save(&$row) {
				$conn = GetConnection();
				
				$row2 = escape_all($row, $conn); //you need to do this so you clean up input (prevents SQL injection)
				if (!empty($row['id'])) {
					$sql = "Update 2014Spring_Products
							set FirstName='$row2[FirstName]', LastName='$row2[LastName]', Password='$row2[Password]', 
							fbid='$row2[fbid]', UserType='$row2[UserType]'
							WHERE id = $row2[id]";
				}else {
					$sql = "INSERT INTO 2014Spring_Products 
						(created_at, FirstName, LastName, Password, fbid, UserType) 
						VALUES (current_timestamp, '$row2[FirstName]', '$row2[LastName]', '$row2[Password]', '$row2[fbid]', '$row2[UserType]')";
				}	
						
				$results = $conn->query($sql);
				$error = $conn->error;
				
				if(!$error && empty($row['id'])){
					$row['id'] = $conn->insert_id;
				}
				
				$conn->close();
				
				return $error ? array ('sql error' => $error) : false;
			}
			
			static public function Blank()
			{
				return array('id' => null);
			}
			
			static public function Update($row) {
				
			}
			
			static public function Delete($id) {
				$conn = GetConnection();
				
				$sql = "DELETE FROM 2014Spring_Products WHERE id = $id";
				
				$results = $conn->query($sql);
				$error = $conn->error;
				
				$conn->close();
				
				return $error ? array ('sql error' => $error) : false;
			}
			
			static public function Validate($row) {
				$errors = array();
				if(empty($row['FirstName'])) $errors['FirstName'] = "is required";
				if(empty($row['LastName'])) $errors['LastName'] = "is required";
				
				if(!is_numeric($row['UserType'])) $errors['UserType'] = "must be a number";
				if(empty($row['UserType'])) $errors['UserType'] = "is required";

				return count($errors) > 0 ? $errors : false;			
			}
		}
