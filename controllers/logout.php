<?php 
	if(isset($_SESSION['id']))
	{
		header('location: index.php');
		exit();
	}
	if(isset($_POST['logout-btn']))
	{
		unset($_SESSION['id']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['verified']);

		unset($_SESSION['message']);
		unset($_SESSION['alert-class']);
		header('location: index.php');
		exit();
	}

?>