<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carrusel | Furniture</title>
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

          <?php

          include_once('conexion.php');
          $resultado="<div class='row'>
                  <div class='panel panel-primary'>
                   <h1>Carrusel</h1>
                      <div class='panel-heading' style='text-align:right;'>
                          <a class='btn btn-success' title='Nuevo' href='newCarrusel.php'>
                                  <span class='glyphicon glyphicon-plus-sign'> Agregar</span>
                          </a>
                      </div>
                          <table class='table'>
                              <thead>
                                  <th>#</th>
                                  <th>Imagen</th>
                                  <th>Producto</th>
                              </thead>
                              ";
          $sql="CALL spGetCarrusel();";
          $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
                      while($row=$result->fetch_assoc()){
                         $resultado.=" <tbody>
                                  <tr>
                                  	<td>".$row['id_imagen']."</td>
                                      <td><img src='images/carrusel/".$row['imagen']."' width='40px' alt=''></td>
                                      <td>".$row['producto']."</td>
                                      <td>
                                          <a class='btn btn-default btn-sm' title='Modificar Imagen' href='modificarCarrusel.php?idImagen=".$row['id_imagen']."'>
                                              <span class='glyphicon glyphicon-edit'></span>
                                          </a>
                                          <a class='btn btn-default btn-sm' title='Eliminar Imagen' onclick='eliminarCarrusel(".$row['id_imagen'].")'>
                                              <span class='glyphicon glyphicon-trash' ></span>
                                          </a>
                                      </td>
                                  </tr>
                              </tbody>
                         ";
                      }
                      $resultado.="</table>
                  </div>
              </div>";
          echo $resultado;

           ?>

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
