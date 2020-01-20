<?php 
error_reporting(0);
require '../config/db.php';

if(isset($_GET['token']))
{
	$token=$_GET['token'];
	verifyUser($token);
}


function verifyUser($token)
{
	global $conn;
	$sql="SELECT * FROM userInformation WHERE token='$token' and verified=0 LIMIT 1";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$user=mysqli_fetch_assoc($result);
		$update_query="UPDATE userInformation SET verified=1 WHERE token='$token'";
		if(mysqli_query($conn,$update_query))
		{
			if(!isset($_SESSION['id']))
			{
				$_SESSION['verified']=1;
			}
		}
		else
		{
			header('location: ../errors.php');
			exit();
		}
	}
	header('location: ../index.php');
	exit();
}

?>