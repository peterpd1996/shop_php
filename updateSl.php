<?php 
	session_start();
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['sl'])) {
		$sl = $_POST['sl'];
	}
	
	
	if (array_key_exists($id,$_SESSION['cart'])) {
		$_SESSION['cart'][$id]['number'] = $sl;
	}


 ?>