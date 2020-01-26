<?php 
	error_reporting(0);
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
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.0-web/css/fontawesome.min.css">
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <?php echo $refresh; ?>
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
			<?php showNav($_SESSION['type']); ?>
			
			<div class="hero-body ">
				<form action="add.php" method="post" >
				    <div class="columns is-fullwidth is-10">
								<div class="column is-9">
									<textarea class="ckeditor" name="editor" contenteditable="true"></textarea>
								  <script>
								      CKEDITOR.replace('editor', {
								      extraPlugins: 'mathjax',
								      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
								      height: 325
								    }, 'article_content', {
										    removeButtons: 'Source',
										});
								  </script>
								</div>
				        <div class="column has-text-centered" style="flex-wrap: wrap;">
				             <div class="field is-grouped">
				                 <div class="control is-expanded">
				                    <input class="input is-medium" type="text" placeholder="Problem Name" name="pnme" value="<?php echo $pnme; ?>">
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
				            <div class="field is-grouped" style="justify-content: center; margin: 50% 0 20px 0;">
				                <div class="control is-center is-fixed-bottom-desktop">
				                    <button type="submit" name="submit-btn" class="button is-info is-medium is-fullwidth is-inverted is-rounded">Submit</button>
				                </div>
				            </div>
				        </div>
				    </div>
				</form>
			</div>
  </section>
  
</body>

</html>