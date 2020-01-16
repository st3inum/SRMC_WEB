<?php require_once 'controllers/authController.php';
	if(isset($_SESSION['id']))
	{
		header('location: home.php');
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
		<?php $typeOfPageToHide="register";
			if(count($Reg_errors)!==0)
			{
				$typeOfPageToHide="login";
			}
		?>
		<style type="text/css">
			    .hero .hero-body .container .column .box .<?php echo $typeOfPageToHide ?>{
						display: none;
					}
		</style>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4	 is-offset-4">
                    <div class="box">


                        <form class="register" action="index.php" method="post">

                        	<?php if(count($Reg_errors)>0): ?>
                        		<div class="alert is-danger">
                        			<?php foreach ($Reg_errors as $error):?>
                        				<li><?php echo $error?></li>
                        			<?php endforeach; ?>
                        		</div>
                        	<?php endif; ?>


                        		<div class="field is-grouped">
                                <div class="control is-expanded">
                                    <input class="input is-medium is-rounded" type="text" placeholder="Name" name="nme" value="<?php echo $nme; ?>">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium is-rounded" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium is-rounded" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium is-rounded" type="password" placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium is-rounded" type="password" placeholder="Confirm Password" name="cnf-password">
                                </div>
                            </div>
                            <div class="field is-horizontal">
														    <div class="field is-expanded">
														      <div class="field has-addons">
														        <p class="control"><a class="button is-static is-rounded is-medium">+880</a></p>
														        <p class="control is-expanded">
														          <input class="input is-rounded is-medium" type="tel" placeholder="Phone number" name="phn-nbr"  value="<?php echo $phoneNumber; ?>">
														        </p>
														      </div>
														    </div>
														</div>

														<div class="field">
														  <div class="control">
														    <div class="select is-rounded is-medium is-fullwidth">
														      <select name="gender" required>
														        <option value="" <?php if ($gender == '') echo 'selected'; ?> hidden>Gender</option> 
														        <option value="male" <?php if ($gender == 'male') echo 'selected'; ?>>Male</option>
														        <option value="female" <?php if ($gender == 'female') echo 'selected'; ?>>Female</option>
														      </select>
														    </div>
														  </div>
														</div>

                            <div class="field">
                              <div class="control">
                              	<!-- <input data-toggle="datepicker"> -->

                 								<input class="input is-medium is-rounded" type="date" name="bday">
                 								<!-- <input type="text" class="form-control docs-date" name="date" placeholder="Pick a date" autocomplete="off"> -->
                              </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium is-rounded" type="text" placeholder="Institution" name="institution">
                                </div>
                            </div>

                            <button type="submit" name="signup-btn" class="button is-info is-medium is-fullwidth is-outlined is-rounded">Register</button>
                            <p class="msg">Already Registered <a href="#">Login</a></p>
                        </form>



                        <!-- <form class="login" style="display: none;"> -->
                        <form class="login" action="index.php" method="post">

                        	<?php if(count($Log_errors)>0): ?>
                        		<div class="alert is-danger">
                        			<?php foreach ($Log_errors as $error):?>
                        				<li><?php echo $error?></li>
                        			<?php endforeach; ?>
                        		</div>
                        	<?php endif; ?>


                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium is-rounded" type="email" placeholder="Your Email" name="userid">
                                     <span class="icon is-small is-left">
      																	<i class="fas fa-envelope"></i>
    																	</span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium is-rounded" type="password" placeholder="Your Password" name="passcode">
                                    <span class="icon is-small is-left">
																      <i class="fas fa-lock"></i>
																    </span>
                                </div>
                            </div>

                            <button class="button is-info is-medium is-fullwidth is-outlined is-rounded" name="login-btn">Login</button>
                            <p class="msg">Not Registered <a href="#">Register</a></p>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
    	$('.msg a').click(function(){$('form').animate({height: "toggle",opacity :"toggle"},"slow");});
    </script>

    <!-- <script async type="text/javascript" src="../js/bulma.js"></script> -->
</body>

</html>