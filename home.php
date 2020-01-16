<?php require_once 'controllers/authController.php' ;
	if(!isset($_SESSION['id']))
	{
		header('location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login or Sign up</title>
		<link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css">
		<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <!-- <link rel="stylesheet" href="styles/debug.css"> -->
		<link rel="stylesheet" href="img/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="img/icon_I4s_icon.ico" />


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link  href="img/datepicker.css" rel="stylesheet">
<script src="img/datepicker.js"></script>






</head>

<body>
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
													  		if($_SESSION['verified'])
													  		{
													  			echo "you are verified ;)";
													  		}
													  		else
													  		{
													  			echo "you need to varify your email send at ".$_SESSION['email'];
													  		}
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