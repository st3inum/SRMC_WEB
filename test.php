<?php require_once 'controllers/authController.php' ;
	/*if(!isset($_SESSION['id']))
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
	}*/
?>
<!DOCTYPE html>
<html>

<head>
    <title>test</title>
    <?php echo $defaultHead ;?>
</head>

<body>
		<?php //echo $navBar; ?>
		<nav class="navbar is-link" role="navigation" aria-label="main navigation" style="box-shadow: 0 0px 0 0;background-color: #043584; ">
				    <div class="navbar-brand">
				        <a class="navbar-item" href="home.php">
				            <img src="img/icon.png" width="40" height="80">
				        </a>
				    </div>
				    <div  class="navbar-menu" style="background-color: transparent;">
				        <div class="navbar-start">

				            <a class="navbar-item" href="#">
				                Requests
				            </a>
				            <a class="navbar-item" href="add.php">
				                Create problem
				            </a>
				        </div>

				        <div class="navbar-end">
				        		<div class="navbar-item">
				        			<font style="font-family: anotherround	; font-size: 30px;" >
				        				<?php echo $_SESSION['name']; ?>
				               </font>
				            </div>
				            <div class="navbar-item">
				            	<form action="home.php" method="post">
				                <button type="submit" name="logout-btn" class="button is-link is-medium is-inverted is-rounded ">Logout</button>
				            	</form>
				            </div>
				        </div>
				    </div>
				</nav>


<!-- style="align-content: space-between;align-items: center;" -->
    <section class="hero is-success is-fullheight">

        <div class="hero-body ">
	        	<div class="container has-text-centered">
				      	
						</div>
        </div>
    </section>
	
</body>
</html>