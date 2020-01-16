<?php require_once 'controllers/logout.php' ?>
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
        		<div class="column is-4 is-offset-4">


        		<div class="box">
						  <form action="home.php" method="post">
						  	<div class="notification">
								  <h3 class="help is-danger"> Welcome <?php echo $_SESSION['username']; ?></h3>
								  <p class="help is-danger">
								  	you need to varify your email send at <?php echo $_SESSION['email']; ?>
								  </p>
							  </div>

							  <button class="button is-info is-medium is-fullwidth is-outlined is-rounded" value="logout-btn">logout</button>
						  </form>
							</div>
        	</div>
        </div>
    </section>
</body>

</html>