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

    <script>
    function onToggle() {
      if (document.querySelector('#cbPass').checked) {
        $('#divPass').show();
      } else {
        $('#divPass').hide();
      }
    }
    </script>
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
      <h2>EDITAR INFORMACIÓN DE LA CUENTA</h2>
      <h4>INFORMACIÓN DE CUENTA</h4>
      <hr/>
      <span style="color:red;">*Campos requeridos</span><br/>
      <form action="saveCustomer.php" method="post">
        <table width="600px">
          <tr>
            <td><label for="nombre_contacto">Nombre</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtnombre_contacto' value="<?php echo $row['nombre_cliente']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="ap_paterno_cliente">Apellido paterno</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtap_paterno_cliente'  value="<?php echo $row['ap_paterno_cliente']; ?>" required/>
            </td>
          </tr>
          <tr>
            <td><label for="ap_materno_cliente">Apellido materno</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtap_materno_cliente'  value="<?php echo $row['ap_materno_cliente']; ?>" required/></td>
          </tr>
          <tr>
            <td><label for="email">Email</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='text' name='txtemail' value="<?php echo $row['email']; ?>"  required/></td>
          </tr>
          </table>
          <label><input id='cbPass' type='checkbox' name='cbPass' onclick="onToggle();" <?php if(isset($_SESSION['cbPass']) && $_SESSION['cbPass'] == 0) { echo ''; }else{echo 'checked';}?>>Cambiar contraseña</label>
          <div id="divPass" <?php if(isset($_SESSION['cbPass']) && $_SESSION['cbPass'] == 0) { echo 'style="display:none;"'; }else{echo 'style="display:inline;"';}?> >
          <hr/>
          <table>
          <tr>
            <td><label for="actualPass">Contraseña actual</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='password' name='txtactualPass'  value=""/></td>
          </tr>
          <tr>
            <td><label for="newPass">Nueva contraseña</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='password' name='txtnewPass'  value=""/></td>
          </tr>
          <tr>
            <td><label for="confirmPass">Confirmar contraseña</label><span style="color:red;">&nbsp;*</span></td>
            <td><input type='password' name='txtconfirmPass'  value=""/></td>
          </tr>
          </table>
          </div>
          <br/>
          <?php if(isset($_SESSION['error_save_customer']) && $_SESSION['error_save_customer'] != ''){
            echo '<div class="error row row-centered">' . $_SESSION['error_save_customer'] . '</div>';
          } ?>
          <input type='submit' value="Guardar"/>
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
