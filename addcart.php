<?php
	session_start();
	require "lib/database.php";
	require "lib/function.php";
	$db = new database;
	if (!isset($_SESSION['idUser'])) {
		header('location:index.php?p=dangnhap');
	}else{

	$id = (int)$_GET['id'];
	$product = $db -> fetchID("product",$id);

	if (!isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['name'] = $product['name_product'];
		$_SESSION['cart'][$id]['img'] = $product['thumbar'];
			
		if($product['sale'] > 0)
		{
			$_SESSION['cart'][$id]['price'] = $product['price'] * (100 - $product['sale'])/100;
		}
		else
		{
			$_SESSION['cart'][$id]['price'] = $product['price'];
		}
		
		$_SESSION['cart'][$id]['number'] = 1;
	}else{
		$_SESSION['cart'][$id]['number'] += 1;
	}
	
	echo "<script>location.href = 'index.php?p=giohang'</script>";
	}
	
	

 ?>