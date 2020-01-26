<?php 
error_reporting(0);
if(!isset($_SESSION['id']) || $_SESSION['type']=='solver')
{
	header('location: ../index.php');
	exit();
}
require 'config/db.php';
$pnme="";
$pans="";
$tags="";
if(isset($_POST['preview-btn']))
{
	$prevw=$_POST['editor'];
	$pnme=$_POST['pnme'];
	$pans=$_POST['pans'];
	$tags=$_POST['tags'];
}

if(isset($_POST['submit-btn']))
{
	$prevw=$_POST['editor'];
	$pnme=$_POST['pnme'];
	$pans=$_POST['pans'];
	$tags=$_POST['tags'];

	if(!(empty($prevw) || empty($pnme) || empty($pans) || empty($tags))){
		$sql="INSERT INTO problemAndSolution(title,problem,solution,tag,setter) VALUES ('".$pnme."','".str_replace('\\','\\\\',str_replace('\\\\','\\',$prevw))."','".$pans."','".$tags."','".$_SESSION['id']."')";
		// echo $sql;	
		if(mysqli_query($conn,$sql))
		{
			header('location: add.php');
			exit();;
		}
		else
		{
			header('location: errors.php');
			exit();
		}
	}

}



?>