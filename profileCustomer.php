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
    <?php include_once('header.php'); ?>
	</header><!--/header-->

	<section>
		<div class="container">
      <h2>MI CUENTA</h2>
      <?php
      include_once('conexion.php');
      $email = $_SESSION['email'];
      $sql = "CALL spQueryProfileCustomer('$email');";
      $result = $conn->query($sql) or die ("error: " .mysqli_error($conn));
      while ($row = $result->fetch_assoc()) {
        echo "<h4>Hola " . $row['nombre_cliente'] . " " .  $row['ap_paterno_cliente'] ."</h4>";
        echo "<p>Desde aquí puedes ver tus actividades recientes y actualizar la información de tu cuenta.</p>";
        echo "<p>INFORMACIÓN DE USUARIO</p>";
        echo $row['nombre_cliente'] . " " .  $row['ap_paterno_cliente'] . "</br>";
        echo $email . " </br>";
        echo "<a href='editCustomer.php'>Modificar datos</a>";
        echo "<hr/>";
        echo "<h4>DOMICILIO DE ENTREGA</h4>";
        if($row['calle'] == ''){
          echo "<a href='addAddress.php'>Agregar dirección</a></br>";
        }else{
          echo "<b>Enviar a:</b> " .  $row['nombre_contacto'] . "</br>";
          echo "<b>Calle:</b> " .  $row['calle'] . "</br>";
          echo "<b>Número exterior:</b> " .  $row['numero_exterior'] . "</br>";
          echo "<b>Número interior:</b> " .  $row['numero_interior'] . "</br>";
          echo "<b>Colonia:</b> " .  $row['colonia'] . "</br>";
          echo "<b>Entre calles:</b> " .  $row['entre_calles'] . "</br>";
          echo "<b>Referencias:</b> " .  $row['referencias'] . "</br>";
          echo "<b>Código postal:</b> " .  $row['codigo_postal'] . "</br>";
          echo "<b>Teléfono:</b> " .  $row['telefono'] . "</br>";
          echo "<a href='changeAddress.php'>Modificar dirección</a></br>";
        }
      }
      ?>

		</div>
	</section>

	<footer id="footer"><!--Footer-->

    <?php include_once('footer.php'); ?>

	</footer><!--/Footer-->

  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
