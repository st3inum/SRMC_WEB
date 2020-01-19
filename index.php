<?php 
    error_reporting(0);
    require_once 'controllers/authController.php';
	if(isset($_SESSION['id']))
	{
		header('location: home.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>

<head>
		<title>Login or Sign up</title>
		<?php echo $defaultHead; ?>
</head>

<body>
		<?php $typeOfPageToHide="register";
			$is_round='is-rounded';
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
                                    <input class="input is-medium <?php echo $is_round; ?>" type="text" placeholder="Name" name="nme" value="<?php echo $nme; ?>">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium <?php echo $is_round; ?>" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium <?php echo $is_round; ?>" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium <?php echo $is_round; ?>" type="password" placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium <?php echo $is_round; ?>" type="password" placeholder="Confirm Password" name="cnf-password">
                                </div>
                            </div>
                            <div class="field is-horizontal">
														    <div class="field is-expanded">
														      <div class="field has-addons">
														        <p class="control"><a class="button is-static <?php echo $is_round; ?> is-medium">+880</a></p>
														        <p class="control is-expanded">
														          <input class="input <?php echo $is_round; ?> is-medium" type="tel" placeholder="Phone number" name="phn-nbr"  value="<?php echo $phoneNumber; ?>">
														        </p>
														      </div>
														    </div>
														</div>

														<div class="field">
														  <div class="control">
														    <div class="select <?php echo $is_round; ?> is-medium is-fullwidth">
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

                 								<input class="input is-medium <?php echo $is_round; ?>" type="date" name="bday">
                 								<!-- <input type="text" class="form-control docs-date" name="date" placeholder="Pick a date" autocomplete="off"> -->
                              </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium <?php echo $is_round; ?>" type="text" placeholder="Institution" name="institution">
                                </div>
                            </div>

                            <button type="submit" name="signup-btn" class="button is-info is-medium is-fullwidth is-outlined <?php echo $is_round; ?>">Register</button>
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
                                    <input class="input is-medium <?php echo $is_round; ?>" type="email" placeholder="Your Email" name="userid">
                                     <span class="icon is-small is-left">
      																	<i class="fas fa-envelope"></i>
    																	</span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium <?php echo $is_round; ?>" type="password" placeholder="Your Password" name="passcode">
                                    <span class="icon is-small is-left">
																      <i class="fas fa-lock"></i>
																    </span>
                                </div>
                            </div>

                            <button class="button is-info is-medium is-fullwidth is-outlined <?php echo $is_round; ?>" name="login-btn">Login</button>
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