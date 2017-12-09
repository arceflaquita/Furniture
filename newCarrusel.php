<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Nueva Imagen Carrusel | Furniture</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	  <link href="css/main.css" rel="stylesheet">
	  <link href="css/responsive.css" rel="stylesheet">
    <link href="css/furniture.css" rel="stylesheet">

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
    <?php include_once('headeradmin.php'); ?>
  </header><!--/header-->
	<section id="form"><!--form-->
		<div class="container">
			<div class="col-md-10">
				<div class="signup-form"><!--sign up form-->
					<h2>Nueva Imagen Carrusel</h2>
					<form action="addCarrusel.php" id="formA" method="post" enctype="multipart/form-data">
            <div class="col-md-5">
              <div>
              <td>Imagen:</td>
              <td><input type="file" name="archivo" id="archivo"  size="35" accept="image/png, .jpeg, .jpg, image/gif" ><input type="hidden" name="action" value="upload" >
             </div>
            </div>
            <div class="col-md-5">
              <?php include_once('consultaCategoria.php'); ?>
              </br>
              <select name="comboProducto" id="comboProducto"  required="required">
                <option value='0'>Selecciona un Producto</option>
              </select>
              </br>
            	</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp; GUARDAR</button>
            </br>
          </form><!--/sign up form-->
				</div>
      </div>
		</div>
	</section><!--/form-->

  <footer id="footer"><!--Footer-->
    <?php include_once('footer.php'); ?>
  </footer><!--/Footer-->

  <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
  <script src="js/carrusel.js"></script>
</body>
</html>
