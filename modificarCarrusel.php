<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modificar Imagen Carrusel | Furniture</title>
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
    .image-upload > input
    {
        display: none;
    }
    .image-upload img
    {
        width: 200px;
        cursor: pointer;
    }
    </style>
</head><!--/head-->

<body>
  <header id="header"><!--header-->
    <?php include_once('headeradmin.php'); ?>
  </header><!--/header-->
	<section id="form"><!--form-->
		<div class="container">
			<div class="col-md-10">
				<div class="signup-form"><!--sign up form-->
					<h2>Modificar Imagen Carrusel</h2>
          <?php
            include_once('conexion.php');
            $idImagen = $_GET['idImagen'];
            $sql = "select id_imagen, c.imagen, c.id_producto, p.id_categoria from pv_carrusel c inner join pv_producto p on c.id_producto = p.id_producto where id_imagen = " . $idImagen;
            $result = $conn->query($sql) or die ("Error: " . mysqli_error($conn));
            $row = mysqli_fetch_array($result);
            $oldImage = $row['imagen'];
            $idCat = $row['id_categoria'];
            $idProd = $row['id_producto'];
          ?>
					<form action="updateCarrusel.php" id="formA" method="post" enctype="multipart/form-data">
            <input type='text' style='display:none;' name='txtIdImagen' id='txtIdImagen'  value=<?php echo $idImagen; ?> />
            <input type='text' style='display:none;' name='txtOldImage' id='txtOldImage'  value=<?php echo $oldImage; ?> />
            <div class="col-md-5">
             <div class="image-upload">
               <label for="file-input">
                 <img id="imgCarrusel" src="images/carrusel/<?php echo $oldImage; ?>" />
               </label>
               <input type="file" name="archivo" id="archivo"  size="35"
                      accept="image/png, .jpeg, .jpg, image/gif" style="display: none;">
               <input type="hidden" name="action" value="upload" style="display: none;">
             </div>
            </div>
            <div class="col-md-5">
              <?php
              $resultado="<select name='comboCategoria' id='comboCategoria' required='required'>
              <option value=''>Selecciona una Categoria</option>";
              $sql="select * from pv_categoria";
              $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
              while($row2=$result->fetch_assoc()){
                $resultado.=" <option value='".$row2['id_categoria']."' ";
                if($row2['id_categoria'] == $idCat) { $resultado.= "selected";  }
                $resultado.=">".$row2['categoria']."</option>";
              }
              $resultado.=" </select> </br>";
              echo $resultado;
               ?>
              </br>
              <?php
              $resultado="<select name='comboProducto' id='comboProducto' required='required'>
              <option value=''>Selecciona una Categoria</option>";
              $sql="select * from pv_producto where id_categoria = " . $idCat;
              $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
              while($row3=$result->fetch_assoc()){
                $resultado.=" <option value='".$row3['id_producto']."' ";
                if($row3['id_producto'] == $idProd) { $resultado.= "selected";  }
                $resultado.=">".$row3['producto']."</option>";
              }
              $resultado.=" </select> </br>";
              echo $resultado;
               ?>

              </br>
            	</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> MODIFICAR</button>
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
