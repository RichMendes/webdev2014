<?php
		include_once __DIR__ . '/../inc/functions.php';		//propper absolute path
		
		class Orders {
			//	CRUD (Create, Read/Get, Update, Delete)
			static public function Get($id = null) {	//	If $id is given a value it will be set to that if nothing is given it will be set to null
				if($id == null) {
					//	Get all records
					$e = fetch_all("SELECT * FROM 2014Spring_Orders");
					return fetch_all("SELECT * FROM 2014Spring_Orders");
				}
				else {
					//	Get one record
				}
			}
			
			static public function Create($row) {
				
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
