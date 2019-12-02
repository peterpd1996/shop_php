<?php 
	session_start();
	require "../../autoload/autoload.php";
	$product = 'active';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$db = new Database;
		$product = $db -> fetchID("product",$id);
		// xóa ảnh ở thư mục đi
		unlink("../../../public/upload/product/".$product['thumbar']);
		$rs = $db -> deletesql('product',"id = $id");
		if ($rs > 0) {
			$_SESSION['success'] = "Xóa thành công";
			header('location:index.php');
		}


		
	}

 ?>