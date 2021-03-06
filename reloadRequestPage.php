<?php error_reporting(0);
	require_once 'controllers/authController.php' ;
	if(!isset($_SESSION['id']))
	{
		header('location: index.php');
		exit();
	}
	if(!$_SESSION['verified'])
	{
		header('location: verification.php');
		exit();
	}
	if($_SESSION['type']!='admin' && $_SESSION['type']!='super' )
	{
		header('location: add.php');
		exit();
	}
	$sql="SELECT * FROM setterRequest";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result)){
			$userDetailsQuery="SELECT * FROM userInformation WHERE userNumber=".$row['userNumber'];
			$res=mysqli_query($conn,$userDetailsQuery);
			if(mysqli_num_rows($res)>0)
			{
				$user=mysqli_fetch_assoc($res);
			}
			else
			{
				header('location: errors.php');
				exit();
			}
?>
			<!-- user description -->
			<div class="column is-6	 is-offset-3">
				<div class="box" style="text-align: left !important; display: flex;justify-content: space-between;">
					<p style="display: inline-flex;flex-direction: column;">
						<b>ID: <?php echo $user['userNumber'] ?></b>
						<b>Name: <?php echo $user['name'] ?></b>
						<b>Email: <?php echo $user['email'] ?></b>
						<b>Institution: <?php echo $user['institution'] ?></b>
					</p>
					<div>
						<a type="submit" href="controllers/setterReqController.php?id=<?php echo $user['userNumber']; ?>&type=1" class="button is-success is-outlined " style="width: 70px;height: 70px;border-radius: 35px;border-width: 4px;"><i class="fas fa-check fa-3x"></i></a>
					<a type="submit" href="controllers/setterReqController.php?id=<?php echo $user['userNumber']; ?>&type=0" class="button is-danger is-outlined " style="width: 70px;height: 70px;border-radius: 35px;border-width: 4px;"><i class="fas fa-times fa-3x"></i></a>
					</div>
				</div>
			</div>
			<!-- user description end -->

<?php
		}
	}else
	{
		echo "no pending request";
	}

?>