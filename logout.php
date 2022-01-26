<?php
	session_start();
	unset($_SESSION['cart']);
	unset($_SESSION['customer']);
	header('location: index.php');
	echo "<alert>You are logged out successfully</alert>";
?>