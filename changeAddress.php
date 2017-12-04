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
    <?php
    include_once('header.php');
    include_once('conexion.php');
    $email = $_SESSION['email'];
    $sql = "CALL spQueryAddress ('" . $email ."');";
    //echo $sql;
    $result = $conn->query($sql) or die ("Error: " . mysqli_error($conn));
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);
    ?>
	</header><!--/header-->

	<section>
		<div class="container">
      <h2>AGREGAR DIRECCIÓN</h2>
      <h4>INFORMACIÓN DE USUARIO</h4>
      <hr/>
      <span style="color:red;">*Campos requeridos</span><br/>
      <form action="saveAddress.php" method="post">
        <table class="table" width="600px">
          <tr>
            <td><label for="nombre_contacto">Nombre de contacto</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtnombre_contacto' value="<?php echo $row['nombre_contacto']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="calle">Calle</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtcalle'  value="<?php echo $row['calle']; ?>" required/>
            </td>
          </tr>
          <tr>
            <td><label for="numero_exterior">Número exterior</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtnumero_exterior'  value="<?php echo $row['numero_exterior']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="numero_interior">Número interior</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtnumero_interior' value="<?php echo $row['numero_interior']; ?>"  required/></td>
          </tr>
          <tr>
            <td><label for="colonia">Colonia</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtcolonia'  value="<?php echo $row['colonia']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="entre_calles">Entre calles</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtentre_calles'  value="<?php echo $row['entre_calles']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="referencias">Referencias</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtreferencias'  value="<?php echo $row['referencias']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="codigo_postal">Código postal</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtcodigo_postal'  value="<?php echo $row['codigo_postal']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="telefono">Teléfono</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='num' name='txttelefono'  value="<?php echo $row['telefono']; ?>" required/></td>
          </tr>
          <tr><td></td><td><input type='submit' value="Guardar"/></td></tr>
        </table>
      </form>
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
