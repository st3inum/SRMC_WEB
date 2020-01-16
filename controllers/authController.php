<?php 

session_start();
require 'config/db.php';
$Reg_errors = array();
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
		// $password=password_hash($password,PASSWORD_DEFAULT);
		$token=bin2hex(random_bytes(50));

		$sql="INSERT INTO userInformation(name,userName,email,token,password,gender,phone,institution) VALUES ('".$nme."','".$username."','".$email."','".$token."','".$password."','".$gender."','".$phoneNumber."','".$institution."')";
		//$sql="INSERT INTO userInformation(username,email,verified,token,password) VALUES (?,?,?,?,?)";
		//$stmt= $conn->prepare($sql);
		//$stmt->bind_param('ssbss',$username,$email,$verified,$token,$password);
		//if($stmt->execute())
		echo $sql;
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