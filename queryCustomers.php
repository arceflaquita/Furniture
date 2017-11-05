<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
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

    <style>
    .layout {
      text-align: center;
    }
    .centre {
      text-align: left;
      width: 800px;
      background-color: #eee;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    </style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
    <?php include_once('headeradmin.php'); ?>
	</header><!--/header-->

	<section>
		<div class="container">
			<div class="row">
        <table border="1">
        <tr>
          <th>Nombre cliente</th>
          <th>Apellido paterno</th>
          <th>Apellido materno</th>
          <th>Email</th>
          <th>Calle</th>
          <th>Número exterior</th>
          <th>Número interior</th>
          <th>Colonia</th>
          <th>Entre calles</th>
          <th>Referencias</th>
          <th>Código postal</th>
          <th>Nombre contacto</th>
          <th>Teléfono</th>
        </tr>
        <?php
          include_once('conexion.php');
          $sql = "CALL spQueryCustomers ();";
          //echo $sql;
          $result = $conn->query($sql);
          //var_dump($result);
          $count = 0;
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre_cliente'] . "</td>";
            echo "<td>" . $row['ap_paterno_cliente'] . "</td>";
            echo "<td>" . $row['ap_materno_cliente'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['calle'] . "</td>";
            echo "<td>" . $row['numero_exterior'] . "</td>";
            echo "<td>" . $row['numero_interior'] . "</td>";
            echo "<td>" . $row['colonia'] . "</td>";
            echo "<td>" . $row['entre_calles'] . "</td>";
            echo "<td>" . $row['referencias'] . "</td>";
            echo "<td>" . $row['codigo_postal'] . "</td>";
            echo "<td>" . $row['nombre_contacto'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "</tr>";
          }
        ?>
        </table>
			</div>
		</div>
	</section>

	<!--<footer id="footer">Footer

    <?php /*include_once('footer.php'); */ ?>

	</footer>-->

  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
