<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="">

	<?php include './inc/nav-bar.php' ?>

    <div class="container">

      <div class="starter-template">
        <h1>Project Home Page</h1>
        <p class="lead">Here is a list of projects:</p>
		<div class="list-group">
		  <a href="./project_home.php" class="list-group-item active">
		    Project Home
		  </a>
		  <a href="./project1.php" class="list-group-item">Project 1</a>
		  <a href="./project2.php" class="list-group-item">Project 2</a>
		</div>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Starter Template for Bootstrap_files/jquery-1.10.2.min.js"></script>
    <script src="./Starter Template for Bootstrap_files/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$(".project-menu").addClass("active");
		})
	</script>
</body></html>
