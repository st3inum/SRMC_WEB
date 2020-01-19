<?php 
	error_reporting(0);
	require_once 'controllers/authController.php' ;
	if(!isset($_SESSION['id']))
	{
		header('location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>

<head>
		<title>verification</title>
    <?php echo $defaultHead; ?>
    <?php echo $refresh; ?>
</head>

<body>
	<?php 
	if($_SESSION['verified'])
	{
		header('location: home.php');
		exit();
	}
 ?>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4	 is-offset-4">
                    <div class="box">


                        <form class="home" action="home.php" method="post">
                        	<div class="notification">
													  <h3 class="help is-danger"> Welcome <?php echo $_SESSION['username']; ?></h3>
													  <p class="help is-danger">
													  	<?php 
													  		echo "you need to varify your email send at ".$_SESSION['email'];
													  	?>
													  </p>
												  </div>
												  <!-- <a href="home.php?logout=1" class="logout">logout</a> -->
												  <button type="submit" name="logout-btn" class="button is-info is-medium is-fullwidth is-outlined is-rounded">Logout</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>