<?php 

session_start();
require 'config/db.php';
$Reg_errors = array();
$username="";
$email="";


if(isset($_POST['signup-btn']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$passwordConf=$_POST['cnf-password'];
	$nme=$_POST['nme'];
	$phoneNumber=$_POST['phn-nbr'];
	if(empty($username)){
		$Reg_errors['username']="Username required";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$Reg_errors['email']="Email address is invalid";
	}
	if(empty($email)){
		$Reg_errors['email']="Email required";
	}
	if(empty($password)){
		$Reg_errors['password']="Password required";
	}

	if($password!==$passwordConf)
	{
		$Reg_errors['password']="The two password do not match";
	}
	//duplicate email check
	$emailQuery="SELECT *FROM users WHERE email=? LIMIT 1";
	$stmt= $conn->prepare($emailQuery);
	$stmt->bind_param('s',$email);
	$stmt->execute();
	$result=$stmt->get_result();
	$userCount=$result->num_rows;
	$stmt->close();
	if($userCount>0)
	{
		$Reg_errors['email']="Email already exists";
	}

	//duplicate username check
	$usernameQuery="SELECT *FROM users WHERE username=? LIMIT 1";
	$stmt= $conn->prepare($usernameQuery);
	$stmt->bind_param('s',$username);
	$stmt->execute();
	$result=$stmt->get_result();
	$userCount=$result->num_rows;
	$stmt->close();
	if($userCount>0)
	{
		$Reg_errors['username']="Username already exists";
	}

	if(count($Reg_errors)===0)
	{
		$password=password_hash($password,PASSWORD_DEFAULT);
		$token=bin2hex(random_bytes(50));
		$verified=0;

		$sql="INSERT INTO users(username,email,verified,token,password) VALUES ('".$username."','".$email."','".$verified."','".$token."','".$password."')";
		//$sql="INSERT INTO users(username,email,verified,token,password) VALUES (?,?,?,?,?)";
		//$stmt= $conn->prepare($sql);
		//$stmt->bind_param('ssbss',$username,$email,$verified,$token,$password);
		//if($stmt->execute())
		if(mysqli_query($conn,$sql))
		{
			//login user
			$user_id=$conn->insert_id;
			$_SESSION['id']=$user_id;
			$_SESSION['username']=$username;
			$_SESSION['email']=$email;
			$_SESSION['verified']=$verified;

			$_SESSION['message']="You are now logged in";
			$_SESSION['alert-class']="is-success";
			header('location: home.php');
			exit();
		}
		else
		{
			$Reg_errors['db_error']="Database error: failed to register";
		}

	}
}
?>