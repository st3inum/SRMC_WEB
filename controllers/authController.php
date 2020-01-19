<?php 

session_start();
require_once 'config/db.php';
require_once 'emailController.php';
$Reg_errors = array();
$Log_errors = array();
$username="";
$email="";
$nme="";
$gender="";
$phoneNumber="";

if(isset($_POST['signup-btn']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$passwordConf=$_POST['cnf-password'];
	$nme=$_POST['nme'];
	$phoneNumber=$_POST['phn-nbr'];
	$gender=$_POST['gender'];
	$institution=$_POST['institution'];
	// $bday = strtotime($_POST['bday']);



	if(empty($username)){
		$Reg_errors['username']="Username required";
	}
	if(empty($institution)){
		$Reg_errors['institution']="institution required";
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
	if(empty($gender)){
		$Reg_errors['gender']="gender required";
	}

	if($password!==$passwordConf)
	{
		$Reg_errors['password']="The two password do not match";
	}
	if(!is_numeric($phoneNumber) ||  strlen($phoneNumber)!=10)
	{
		$Reg_errors['phoneNumber']="Enter a right phone number";
	}

	if($gender!='male' && $gender!='female')
	{
		$Reg_errors['gender']="choose a gender";
	}
	//duplicate email check
	$emailQuery="SELECT *FROM userInformation WHERE email=? LIMIT 1";
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
	$usernameQuery="SELECT *FROM userInformation WHERE userName=? LIMIT 1";
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
		$token=bin2hex(random_bytes(50));

		$sql="INSERT INTO userInformation(name,userName,email,token,password,gender,phone,institution) VALUES ('".$nme."','".$username."','".$email."','".$token."','".$password."','".$gender."','".$phoneNumber."','".$institution."')";
		if(mysqli_query($conn,$sql))
		{
			//login user
			$user_id=$conn->insert_id;
			$_SESSION['id']=$user_id;
			$_SESSION['username']=$username;
			$_SESSION['email']=$email;
			$_SESSION['verified']=0;
			$_SESSION['message']="You are now logged in";
			$_SESSION['alert-class']="is-danger";
			$_SESSION['type']="solver";
			$_SESSION['name']=$nme;

			sendVerificationEmail($email,$token);


			header('location: home.php');
			exit();
		}
		else
		{
			$Reg_errors['db_error']="Database error: failed to register";
		}

	}
}



if(isset($_POST['login-btn']))
{
	$id=$_POST['userid'];
	$password=$_POST['passcode'];
	if(empty($id)){
		$Log_errors['email']="Email required";
	}
	if(empty($password)){
		$Log_errors['password']="Password required";
	}

	if(count($Log_errors)===0)
	{
		$sql="SELECT * FROM userInformation where email=? LIMIT 1";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$user = $result->fetch_assoc();
		$userCount=$result->num_rows;
		if($userCount>0 && $password==$user['password'])
		{
			// login
			$_SESSION['id']=$user['userNumber'];
			$_SESSION['username']=$user['userName'];
			$_SESSION['email']=$user['email'];
			$_SESSION['verified']=$user['verified'];
			$_SESSION['type']=$user['userType'];
			$_SESSION['name']=$user['name'];
			$_SESSION['message']="You are now logged in";
			$_SESSION['alert-class']="is-danger";
			header('location: home.php');
			exit();
		}
		else
		{
			$Log_errors['login_fail']="wrong username or password";
		}
	}
}


if(isset($_POST['logout-btn']))
{
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['verified']);
	unset($_SESSION['message']);
	unset($_SESSION['type']);
	unset($_SESSION['name']);
	unset($_SESSION['alert-class']);
	header('location: index.php');
	exit();
}

if(isset($_POST['request-btn']))
{
	$sql="INSERT INTO setterRequest(userNumber) VALUES ('".$_SESSION['id']."')";
	if(mysqli_query($conn,$sql))
	{
		header('location: home.php');
		exit();
	}
	else
	{
		header('location: errors.php');
		exit();
	}
}




?>