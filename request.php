<?php require_once 'controllers/authController.php' ;
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
?>
<!DOCTYPE html>
<html>

<head>
    <title>Request</title>
    <?php echo $defaultHead ;?>
</head>

<body>
		<?php echo $navBar; ?>
    <section class="hero is-success is-fullheight">

        <div class="hero-body ">
	        	<div class="container has-text-centered">
				      	<!-- This is Request page -->
				      	<?php 
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
				      				<h1><?php echo $user['name']; ?></h1>
				      				<p>hi please accept my request</p>
				      				<p>
				      					<button href="#">Accept</button>
				      					<button href="#">Regect</button>
				      				</p>
				      				<!-- end user description -->


				      			<?php
				      			}
				      		}else
				      		{
				      			echo "no pending request";
				      		}

				      	?>
						</div>
        </div>
    </section>
	
</body>
</html>