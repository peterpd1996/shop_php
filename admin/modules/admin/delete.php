<?php 
	session_start();
	require "../../autoload/autoload.php";
	$admin = 'active';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$db = new Database;
		$product = $db -> fetchID("users",$id);
		// xóa ảnh ở thư mục đi
		$rs = $db -> deletesql('admin',"id = $id");
		if ($rs > 0) {
			$_SESSION['success'] = "Xóa thành công";
			header('location:index.php');
		}


		
	}

 ?>