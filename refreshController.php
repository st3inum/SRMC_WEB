<?php error_reporting(0);
	require_once 'controllers/authController.php';
	if(!isset($_SESSION['id']))
	{
		header('location: index.php');
		exit();
	}
	$temp=$_SESSION['type'].$_SESSION['verified'];
	$sql="SELECT * FROM userInformation where userNumber=".$_SESSION['id'];
	$result=mysqli_query($conn,$sql);
	$user=$result->fetch_assoc();
	$_SESSION['username']=$user['userName'];
	$_SESSION['email']=$user['email'];
	$_SESSION['verified']=$user['verified'];
	$_SESSION['type']=$user['userType'];
	$_SESSION['name']=$user['name'];
?>