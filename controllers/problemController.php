<?php 
require 'config/db.php';
$pnme="";
$pans="";
$tags="";
$prevw="";
if(isset($_POST['preview-btn']))
{
	$prevw=$_POST['prevw'];
	$pnme=$_POST['pnme'];
	$pans=$_POST['pans'];
	$tags=$_POST['tags'];
}

if(isset($_POST['submit-btn']))
{
	$prevw=$_POST['prevw'];
	$pnme=$_POST['pnme'];
	$pans=$_POST['pans'];
	$tags=$_POST['tags'];

	if(!(empty($prevw) || empty($pnme) || empty($pans) || empty($tags))){
		$sql="INSERT INTO problemAndSolution(title,problem,solution,tag,setter) VALUES ('".$pnme."','".$prevw."','".$pans."','".$tags."','".$_SESSION['id']."')";
		// echo $sql;	
		if(mysqli_query($conn,$sql))
		{
			header('location: add.php');
			exit();;
		}
		else
		{
			{
				header('location: errors.php');
				exit();;
			}
		}
	}

}



?>