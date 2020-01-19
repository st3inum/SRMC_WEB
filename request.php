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
				      				<form>
				      					<h2><?php echo $user['name'] ?></h2>
					      				<button type="submit" name="accept-btn" class="button is-success is-outlined " style="width: 70px;height: 70px;border-radius: 35px;border-width: 4px;"><i class="fas fa-check fa-3x"></i></button>
					      				<button type="submit" name="reject-btn" class="button is-danger is-outlined " style="width: 70px;height: 70px;border-radius: 35px;border-width: 4px;"><i class="fas fa-times fa-3x"></i></button>
				      				</form>
				      				<!-- user description end -->

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