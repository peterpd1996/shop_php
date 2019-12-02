<?php 
	ob_start();
	require "../../autoload/autoload.php";
	$transaction = 'active';
 	require "../../layouts/header.php";
 	$db = new database;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$transac = $db->fetchID("transaction",$id);
		if ($transac == NULL) {
			$_SESSION['error'] = "KHÔNG TỒN TẠI ĐƠN HÀNG !!";
			header('location:index.php');
		}

		if ($transac['status'] == 1) {
			header('location:index.php');
		}
		$stt = 1;
        $db -> update("transaction",array("status" => $stt),array("id" => (int)$id));
		
		header('location:index.php');

		
			
		}
	
 ?>