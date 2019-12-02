<?php 
	session_start();
	require "../../autoload/autoload.php";
	$category = 'active';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$db = new Database;
		// kiểm tra xem danh mục này có sản phẩm không nếu không có mới cho xóa
		$is_product = $db -> fetchID("product",$id);
		if ($is_product == NULL) {
		  $db -> deletesql('category',"id = $id");
		  $_SESSION['success'] = "Xóa thành công !!!";
		  header('location:index.php');
		}
		else
		{
			// khác null nghĩa là có sản phẩm
			$_SESSION['error'] = "Danh mục bạn muốn xóa có sản phẩm không thể xóa !!!";
			header('location:index.php');
		}

		
	}

 ?>