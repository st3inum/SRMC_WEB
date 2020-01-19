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
				      	This is Request page
						</div>
        </div>
    </section>
	
</body>
</html>