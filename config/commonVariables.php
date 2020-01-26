<?php 
error_reporting(0);
	if(isset($_SESSION['name']))
	$navBar='<nav class="navbar is-link" role="navigation" aria-label="main navigation" style="box-shadow: 0 0px 0 0;background-color: #043584; ">
				    <div class="navbar-brand">
				        <a class="navbar-item" href="home.php">
				            <img src="img/icon.png" width="40" height="80" style="max-height: 3rem;">
				        </a>
									<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">				        	
								  <span aria-hidden="true"></span>
								  <span aria-hidden="true"></span>
								  <span aria-hidden="true"></span>
									<script>
						        $(document).ready(function() {
										  $(".navbar-burger").click(function() {
										      $(".navbar-burger").toggleClass("is-active");
										      $(".navbar-menu").toggleClass("is-active");
										  });
										});
				        	</script>
								</a>
				    </div>
				    <div  class="navbar-menu" style="background-color: transparent;">
				        <div class="navbar-start">

				            <a class="navbar-item" href="request.php" style="font-size: 20px;">Requests</a>
				            <a class="navbar-item" href="add.php" style="font-size: 20px;">Create problem</a>
				        </div>

				        <div class="navbar-end">
				        		<div class="navbar-item">
				        			<font style="font-family: \'Sigmar One\', cursive; font-size: 30px;" >
				        				'.$_SESSION['name'].'
				               </font>
				            </div>
				            <div class="navbar-item">
				            	<form action="home.php" method="post">
				                <button type="submit" name="logout-btn" class="button is-link is-medium is-inverted is-rounded ">Logout</button>
				            	</form>
				            </div>
				        </div>
				    </div>
				</nav>';
	$defaultHead='<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="img/style.css"> <!-- style.css for hero -->
		<link rel="stylesheet" href="src/bulma.min.css"> <!-- bulma -->
		<link rel="shortcut icon" type="image/x-icon" href="img/icon_I4s_icon.ico" />
		<script id="MathJax-script" async src="MathJax-3.0.0/es5/latest.js?config=TeX-AMS_HTML"></script> <!-- mathjax -->
		<script defer src="src/all.js"></script><!-- font awesome -->
    <script src="src/jquery-3.4.1.min.js"></script><!-- jquery -->
    <link href="https://fonts.googleapis.com/css?family=Sigmar+One&display=swap" rel="stylesheet"><!-- Sigmar One G-Font -->';



    $refresh = '<script>
			$(document).ready(function(){
			  setInterval(function(){
					$("#refresh").load("refreshController.php");
				},2000);
			});	
		</script>
		<div id=refresh></div>';
		

		function showNav($user)
		{
			global $navBar;
			$temp=$navBar;
			if($user=='solver')
			{
				$temp=str_replace('<a class="navbar-item" href="request.php" style="font-size: 20px;">Requests</a>', ' ', $temp);
				$temp=str_replace('<a class="navbar-item" href="add.php" style="font-size: 20px;">Create problem</a>', ' ', $temp);
			}
			if($user=='setter')
			{
				$temp=str_replace('<a class="navbar-item" href="request.php" style="font-size: 20px;">Requests</a>', ' ', $temp);
			}
			echo $temp;
		}
?>