<?php 
	require "lib/database.php";
	$db = new Database;
	session_start();
	if (!empty($_POST['comment'])) {
		$cmt = $_POST['comment'];
		$cmt = htmlspecialchars($cmt);
	}
	$data = [
		"id_user" => $_SESSION['idUser'],
		"id_sanpham" => $_POST['id_sanpham'],
		"cmt" => $cmt
	];
	$db->insert('comment',$data);
	 $id_user = $_SESSION['idUser'];
     $query = "SELECT name FROM users WHERE id = $id_user";
     $name = $db->fetchsql($query);
     $name = $name[0]['name'];
	$date = date("d/m/Y  H:i",time());
	echo "	<li class='media'>
	<a class='pull-left' >
	<img class='media-object' src='http://placehold.it/64x64' >
	</a>
	<div class='media-body'>
	<h4 class='media-heading'> $name
	<small> $date</small>
</h4>
	$cmt	
</div>
</li>";

 ?>
						 