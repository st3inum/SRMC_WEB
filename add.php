<?php 
	require_once 'controllers/authController.php' ;
	require_once 'controllers/problemController.php' ;
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
	if($_SESSION['type']=='solver')
	{
		header('location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>

<head>
		<title>Add Problem</title>
    <?php echo $defaultHead; ?>
</head>

<body>
	<script>
	MathJax = {
	  tex: {
	    inlineMath: [['$', '$'], ['\\(', '\\)']]
	  }
	};
	</script>
  <section class="hero is-success has-addons-fullwidth">
			<?php echo $navBar; ?>
			<div class="hero-body ">
				<form action="add.php" method="post" >
				    <div class="columns is-fullwidth">
				        <div class="column">
				            <textarea  class="textarea" placeholder="Problem Description" rows="10" name="prevw"><?php echo $prevw;?></textarea>
				        </div>
				        <div class="column has-text-centered" style="flex-wrap: wrap;">
				            <div class="field is-grouped">
				                <div class="control is-expanded">
				                    <input class="input is-medium" type="text" placeholder="Problem Name" name="pnme" value="<?php echo $pnme; ?>">
				                </div>
				            </div>
				            <div class="field is-grouped" style="justify-content: center;">
				                <div class="control is-center">
				                    <button type="submit" name="preview-btn" class="button is-info is-medium is-fullwidth is-inverted">Preview</button>
				                </div>
				            </div>
				            <div class="field is-grouped">
				                <div class="control is-expanded">
				                    <input class="input is-medium" type="text" placeholder="Answer of The Problem" name="pans" value="<?php echo $pans; ?>">
				                </div>
				            </div>
				            <div class="field is-grouped">
				                <div class="control is-expanded">
				                    <input class="input is-medium" type="text" placeholder="Tags: Eg. Number Theory,Geometry" name="tags" value="<?php echo $tags; ?>">
				                </div>
				            </div>
				            <div class="field is-grouped" style="justify-content: center;">
				                <div class="control is-center">
				                    <button type="submit" name="submit-btn" class="button is-info is-medium is-fullwidth is-inverted is-rounded">Submit</button>
				                </div>
				            </div>
				        </div>
				        <div class="column">
				            <div class="textarea readonly" rows=10>
				                <?php 
				                  if($prevw=='')
				                  {
				                  	echo "<font color=\"#dbdbdb\">Problem Preview</font>";
				                  }
				                  else{
														echo $prevw;
				                  }
												?>
				            </div>
				        </div>
				    </div>
				</form>
			</div>
  </section>
    
</body>

</html>