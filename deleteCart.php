<?php 
session_start();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		unset($_SESSION['cart'][$id]);
		if (count($_SESSION['cart']) ==0) {
			unset($_SESSION['cart']);
		}
		header('location:index.php?p=giohang');
		
		

	}
	
 ?>