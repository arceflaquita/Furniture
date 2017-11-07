
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
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
 <?php 
 include_once('conexion.php');
 $idProvedor=$_GET['idProvedor'];
 $provedor="";
 $contacto="";
 $telefono="";
 $correo="";
 $calle="";
 $noExterior="";
 $noInterir="";
 $idEstado="";
 $idMunicipio="";
 $idColonia="";
 $idCp="";
 
 $sql="select *  from pv_provedor where id_provedor=".$idProvedor;
 $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
 while($row=$result->fetch_assoc()){
 	$provedor=$row['provedor'];
 	$contacto=$row['contacto'];
 	$telefono=$row['telefono'];
 	$correo=$row['correo'];
 	$calle=$row['calle'];
 	$noExterior=$row['no_exterior'];
 	$noInterir=$row['no_interior'];
 	$idEstado=$row['id_estado'];
 	$idMunicipio=$row['id_municipio'];
 	$idColonia=$row['id_colonia'];
 	$idCp=$row['id_cp'];
 }
 
 $resultadoEstado="";
 
 $sql="select * from pv_estado";
 $resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
 while($row=$resulta->fetch_assoc()){
 	if($idEstado=$row['id_estado']){
 		$resultadoEstado.=" <option value='".$row['id_estado']."' selected>".$row['estado']."</option>";
 	}else{
 		$resultadoEstado.=" <option value='".$row['id_estado']."' >".$row['estado']."</option>";
 	}
 }
 
 $resultadoMunicipio="";
 
 $sql="select * from pv_municipio where id_estado=".$idEstado;
 $resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
 while($row=$resulta->fetch_assoc()){
 	if($idMunicipio=$row['id_municipio']){
 		$resultadoMunicipio.=" <option value='".$row['id_municipio']."' selected>".$row['municipio']."</option>";
 	}else{
 		$resultadoMunicipio.=" <option value='".$row['id_municipio']."' >".$row['municipio']."</option>";
 	}
 }
 
 $resultadoColonia="";
 
 $sql="select * from pv_colonia where id_municipio=".$idMunicipio;
 $resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
 while($row=$resulta->fetch_assoc()){
 	if($idColonia=$row['id_colonia']){
 		$resultadoColonia.=" <option value='".$row['id_colonia']."' selected>".$row['colonia']."</option>";
 	}else{
 		$resultadoColonia.=" <option value='".$row['id_colonia']."' >".$row['colonia']."</option>";
 	}
 }
 	
 	$resultadoCP="";
 	
 	$sql="select * from pv_cp where id_colonia=".$idColonia;
 	$resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
 	while($row=$resulta->fetch_assoc()){
 		if($idCp=$row['id_cp']){
 			$resultadoCP.=" <option value='".$row['id_cp']."' selected>".$row['cp']."</option>";
 		}else{
 			$resultadoCP.=" <option value='".$row['id_cp']."' >".$row['cp']."</option>";
 		}
 }
 
 
 
 ?>
  <header id="header"><!--header-->
    <?php include_once('header.php'); ?>
  </header><!--/header-->
  <section id="form"><!--form-->
    <div class="container">
  
        <div class="col-md-10">
          <div class="signup-form"><!--sign up form-->
            <h2>Nuevo Provedor</h2>
            <form action="updateProvedor.php" method="post">
            <input type='text' style='display:none;' name='txtIdprovedor' id='txtIdprovedor'  value=<?php echo $idProvedor?> />
              <div class="col-md-5">
              <input type="text" name="txtProvedor"  class="form-control" placeholder="Nombre del Provedor" value=<?php echo $provedor ?> required="required"/>
               
              <input type="text" name="txtContacto" class="form-control" placeholder="contacto" value=<?php echo $contacto ?> required="required"/>
            
              <input type="tel" name="txtTelefono" class="form-control" placeholder="Telefono" value=<?php echo $telefono ?> required="required"/>

              <input type="email" name="txtCorreo" class="form-control" placeholder="Correo" value=<?php echo $correo ?> required="required"/>

              <input type="text" name="txtCalle" class="form-control" placeholder="Calle" value=<?php echo $calle ?> required="required"/>
              <div class="col-md-7">
                <input type="text" name="txtNumExterior" class="form-control" placeholder="Numero Exterio" value=<?php echo $noExterior ?> required="required"/>
                <input type="text" name="txtNumInterior" class="form-control" placeholder="Numero Interior" value=<?php echo $noInterir ?> required="required"/>
              </div>
          
            </div>
            <div class="col-md-5">
          
            
              <h5>Estado</h5>
              <select name="estado" id="estado">
              <option value="0">Seleccione un Estado</option>
                <?php echo $resultadoEstado ?>
              </select>
              
              <h5>Municipio</h5>
              <select name="municipio" id="municipio">
                <option value="0">Seleccione un Municipio</option>
                <?php echo $resultadoMunicipio ?>
              </select>
              

              
              <h5>Colonia</h5>
              <select name="colonia" id="colonia">
                <option value="0">Seleccione una Colonia</option>
                <?php echo $resultadoColonia ?>
              </select>
              

             
              <h5>Codigo Postal</h5>
              <select name="codigoPostal" id="codigoPostal">
                <option value="0">Seleccione un codigo Postal</option>
                <?php echo $resultadoCP ?>
              </select>
              
            

              </br></br>
             
              </div>
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> AGREGAR</button>
              


            </form>
          </div><!--/sign up form-->
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
  <script src="js/index2.js"></script>
</body>
</html>

