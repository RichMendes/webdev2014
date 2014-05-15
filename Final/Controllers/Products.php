<?php
	include_once __DIR__ . '/../inc/functions.php';
	include_once __DIR__ . '/../inc/allModels.php';
	
	@$view = $action = $_REQUEST['action'];
	@$format = $_REQUEST['format'];
	@$id = $_REQUEST['id'];
	@$category_id = $_REQUEST['category_id'];
	$layout = '_Layout';
	if(Accounts::IsLoggedIn()) {
		$user = Accounts::GetCurrentUser();
		if(Accounts::IsAdmin()){
			$userAdmin = 14;
		}
	}
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
		case 'query':
			$model = Products::GetPlotkinData();
			$layout = '_PublicLayout';
			$view = 'home';
			break;
		case 'save':
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
			$errors = Products::Validate($_REQUEST);
			if(!$errors){
				$errors = Products::Save($_REQUEST);
			}
			if(!$errors){
				header("Location: ?action=index&sub_action=$sub_action&pid=$_REQUEST[id]");
				die();
			}else {
				$model = $_REQUEST;
				$view = 'edit';
			}
			break;
		case 'delete':
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
		case 'picture':
			$img = $_REQUEST['img'];
			$layout = '_PublicLayout';
			$view = 'picture';
			break;
			
		//	ACCOUNT
		case 'accountInfo':
			//Accounts::RequireLogin();
			$model = Products::GetAccountInfo($_REQUEST['id']);
			$layout = '_PublicLayout';
			$view = 'accountInfo';
			break;
		case 'saveInfo':
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated_info';
			$errors = Products::ValidateInfo($_REQUEST);
			if(!$errors){
				$errors = Products::SaveInfo($_REQUEST);
			}
			if(!$errors){
				header("Location: ../Controllers/Accounts.php?welcome=true");
				die();
			}else {
				$model = $_REQUEST;
				$view = 'accountInfo';
			}
			break;
			if(!$errors){
				header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
				die();
			}else {
				$model = $_REQUEST;
				$layout = '_PublicLayout';
				$view = 'accountInfo';
			}
			break;
		
		//	ORDERS
		case 'orderInfo':
			Accounts::RequireLogin();
			$model = Products::GetOrderInfo($_REQUEST['id']);
			$layout = '_PublicLayout';
			$view = 'orderInfo';
			break;
		case 'editOrder':
			Accounts::RequireLogin();
			$model = Products::GetOrderInfo($_REQUEST['id'], $_REQUEST['oid']);
			$layout = '_PublicLayout';
			$view = 'editOrder';
			break;
		case 'saveOrder':
			Accounts::RequireLogin();
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
			$errors = Products::ValidateOrder($_REQUEST);
			if(!$errors){
				$errors = Products::SaveOrder($_REQUEST);
			}
			if(!$errors){
				header("Location: ?action=orderInfo&sub_action=$sub_action&id=$_REQUEST[uid]"); //add $_REQUEST[id] for the id of the order that was updated
				die();
			}else {
				$model = $_REQUEST;
				$view = 'editOrder';
			}
			break;
		case 'selectAddress':
			Accounts::RequireLogin();
			$_SESSION['cart'] = $_POST;
			$model = Accounts::GetCurrentUser();
			$layout = '_PublicLayout';
			$view = 'selectAddress';
		break;
		case 'placeOrder':
			Accounts::RequireLogin();
			$errors = Products::PlaceOrder($_REQUEST, $_SESSION['cart']);
			if(!$errors){
				$model = Products::GetOrderInfo($_REQUEST['id']);
				$layout = '_PublicLayout';
				$orderPlaced = true;
				$view = 'orderInfo';
				unset($GLOBALS[_SESSION]['cart']);
			}
			else {
				$model = $_REQUEST;
				$layout = '_PublicLayout';
				$view = 'home';
			}
			break;
		case 'clearCart':
			unset($GLOBALS[_SESSION]['cart']);
			$model = Accounts::GetCurrentUser();
			$layout = '_PublicLayout';
			$view = 'home';
			break;
			
		//	ORDER ITEMS
		case 'orderItems':
			Accounts::RequireLogin();
			$model = Products::GetItems($_REQUEST['id']);
			$layout = '_PublicLayout';
			$view = 'orderItems';
			break;
		case 'editItems':
			Accounts::RequireLogin();
			$model = Products::GetItems($_REQUEST['id'], $_REQUEST['oid']);
			$layout = '_PublicLayout';
			$view = 'editItems';
			break;
		case 'saveItems':
			Accounts::RequireLogin();
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
			$errors = Products::ValidateItems($_REQUEST);
			if(!$errors){
				$errors = Products::SaveItems($_REQUEST);
			}
			if(!$errors){
				header("Location: ?action=orderInfo&sub_action=$sub_action&id=$_REQUEST[uid]"); //add $_REQUEST[id] for the id of the order that was updated
				die();
			}else {
				$model = $_REQUEST;
				$view = 'editItems';
			}
			break;
		case 'deleteItem':
			if($_SERVER['REQUEST_METHOD'] == 'GET'){
				//prompt
				$model = Products::GetItems($_REQUEST['id']); //idk what this is for
			} else{
				$errors = Products::DeleteItems($_REQUEST['id']);
			}
			break;
			
		//	LOGIN/OUT
		case 'login':
			Accounts::RequireLogin();
			$layout = '_PublicLayout';
			if($view == null) $view = 'home';
			break;
		case 'test':
			$layout = '_PublicLayout';
			$view = 'home2';
			break;
		case 'logout':
			session_unset();
			$user = null;
			$view = 'home';
			$layout = '_PublicLayout';
			break;
			
		default:
			$model = Accounts::GetCurrentUser();
			$layout = '_PublicLayout';
			if($view == null) $view = 'home';
	}

	switch ($format) {
		case 'json':
			$ret = array('success'=> empty($errors), 'errors'=> $errors, 'data'=> $model);
			echo json_encode($ret);
			break;
		case 'query':
			echo json_encode($model);
			break;
		case 'plain':
			include __DIR__ . "/../Views/Products/$view.php";			
			break;
		default:
			$view = __DIR__ . "/../Views/Products/$view.php";	
			include __DIR__ . "/../Views/Shared/$layout.php";
			break;
	}