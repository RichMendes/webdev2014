<?php
	include_once __DIR__ . '/../inc/functions.php';
	include_once __DIR__ . '/../inc/allModels.php';
	
	@$view = $action = $_REQUEST['action'];
	@$format = $_REQUEST['format'];
	@$id = $_REQUEST['id'];
	@$category_id = $_REQUEST['category_id'];
 
	switch ($action){
		case 'new':
			$view = 'edit';
			break;
		case 'edit':
			$model = Products::Get($_REQUEST['id']);
			break;
		case 'details':
			$model = Products::Get($_REQUEST['id']);
			$view = 'details';
			break;
		case 'save':
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
			$errors = Products::Validate($_REQUEST);
			if(!$errors){
				$errors = Products::Save($_REQUEST);
			}
			if(!$errors){
				header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
				die();
			}else {
				$model = $_REQUEST;
				$view = 'edit';
			}
			break;
		case 'delete':
			/*$sub_action_delete = 'deleted';
			$deleted = Users::Get($_REQUEST['id']);
			$errors = Users::Delete($_REQUEST['id']);
			$model = Users::Get();
			$view = 'index';*/
			
			//Plotkin's method:
			if($_SERVER['REQUEST_METHOD'] == 'GET'){
				//prompt
				$model = Products::Get($_REQUEST['id']);
			} else{
				$errors = Products::Delete($_REQUEST['id']);
			}
			break;
		case 'index':
				$model = Products::Get($id, $category_id);
				break;
		case 'categories':
			$model = Products::GetCategories();
			break;
		default:
			if($view == null) $view = 'home';
	}

	switch ($format) {
		case 'json':
			$ret = array('success'=> empty($errors), 'errors'=> $errors, 'data'=> $model);
			echo json_encode($ret);
			break;
		case 'plain':
			include __DIR__ . "/../Views/Products/$view.php";			
			break;
		default:
			$view = __DIR__ . "/../Views/Products/$view.php";	
			include __DIR__ . "/../Views/Shared/_Layout.php";
			break;
	}