<?php 
	if (isset($_SESSION['successOrder'])) {
		echo "<p class = 'alert alert-success'> ".$_SESSION['successOrder']." </p> ";
		unset($_SESSION['successOrder']);
	}
 ?>