<?php 
	error_reporting(0);
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
	if($_SESSION['type']!='solver')
	{
		header('location: add.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>

<head>
		<title>home</title>
    <?php echo $defaultHead; ?>
   	<?php echo $refresh; ?>
</head>

<body>
	
<!-- style="align-content: space-between;align-items: center;" -->
    <section class="hero is-success is-fullheight">
				<?php showNav($_SESSION['type']); ?>
        <div class="hero-body ">
	        	<div class="container has-text-centered">
				      	<form class="home" action="home.php" method="post">
				      		<div>
				      			<?php 
					      			$in_list_of_request = "SELECT * FROM setterRequest WHERE userNumber=".$_SESSION['id'];
											if((mysqli_num_rows(mysqli_query($conn,$in_list_of_request))>0))
											{
												echo '<button class="button is-primary is-light is-inverted" disabled>You have Requested</button>';
											}
											else
											{
												echo '<button type="submit" class="button is-primary is-light" name="request-btn">Become a problem setter</button>';
											}	
					      		?>
				      		</div>
			          </form>
						</div>
        </div>
    </section>
</body>
</html>