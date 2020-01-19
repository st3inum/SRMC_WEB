<?php
	error_reporting(0); 
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('location: ../index.php');
		exit();
	}
	if(!$_SESSION['verified'])
	{
		header('location: ../verification.php');
		exit();
	}
	if($_SESSION['type']!='admin' && $_SESSION['type']!='super' )
	{
		header('location: ../add.php');
		exit();
	}
	require '../config/db.php';
	// require 'authController.php';
	// echo $_SESSION['id'];


	$id=$_GET['id'];
	$type=$_GET['type'];
	$sql = "DELETE FROM setterRequest WHERE userNumber=".$id;
	if(!mysqli_query($conn,$sql))
	{
		header('location: ../ok.php');
		exit();
	}
	if($type)
	{
		$updateQuery = "UPDATE userInformation SET userType='setter' WHERE userNumber=".$id;
		if(!mysqli_query($conn,$updateQuery))
		{
			header('location: ../errors.php');
			exit();
		}
	}
	header('location: ../request.php');
	exit();


?>