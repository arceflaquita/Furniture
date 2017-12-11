<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Furniture</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
  	<link href="css/main.css" rel="stylesheet">
  	<link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
    <?php include_once('header.php'); ?>
	</header><!--/header-->

  <div id="contact-page" class="container">
    	<div class="bg">
    		<div class="row">
	    		<div class="col-sm-8">
            <?php
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'] . "\n\nFrom: " . $email ;
            $to = "furnitinfo@gmail.com";
            mail($to, $subject, $message);
            echo "<h2>Su correo se envio correctamente!</h2>";
            ?>
	    		</div>
	    	</div>
    	</div>
    </div><!--/#contact-page-->

	<footer id="footer"><!--Footer-->

    <?php include_once('footer.php'); ?>

	</footer><!--/Footer-->

  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
  <script src="js/index.js"></script>
</body>
</html>
