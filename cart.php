<?php
	session_start();
	 include_once('conexion.php');
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";
						$sql="select * from pv_imagen, pv_producto where pv_producto.id_producto=".$_GET['id']."";
						$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
                     while($row=$result->fetch_assoc()){
							$nombre=$row['producto'];
							$precio=$row['precio_venta'];
							$imagen=$row['imagen'];
						}
						$datosNuevos=array('Id'=>$_GET['id'],
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$sql="select * from pv_imagen, pv_producto where pv_producto.id_producto=".$_GET['id']."";
						$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
                     while($row=$result->fetch_assoc()){
				            $nombre=$row['producto'];
							$precio=$row['precio_venta'];
							$imagen=$row['imagen'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
   <?php
   echo "<div class='table-responsive cart_info'>
   <table class='table table-condensed'>
					<thead>
						<tr class='cart_menu'>
							<td class='image'>Imagen</td>
							<td class='description'>Nombre</td>
							<td class='price'>Precio</td>
							<td class='quantity'>Cantidad</td>
							<td class='total'>Total</td>
							<td></td>
						</tr>
					</thead>";
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
				echo "
						<tbody>
						
						<tr>
							<td class='cart_product'>
								<a href=''><img src='./files/".$datos[$i]['Imagen']."' style='width: 15%;'></a>
							</td>
							<td class='cart_description'>
								<h4><a href=''>".$datos[$i]['Nombre']."</a></h4>
								
							</td>
							<td class='cart_price'>
								<p>$".$datos[$i]['Precio']."</p>
							</td>
							<td class='cart_quantity'>
								<div class='cart_quantity_button'>
									<a class='cart_quantity_up' href=''> + </a>
									<input class='cart_quantity_input' type='text' name='quantity' value='".$datos[$i]['Cantidad']."'
									 autocomplete='off' size='2' 
									 data-precio='". $datos[$i]['Id']."'
							data-id='". $datos[$i]['Id']."'>
									<a class='cart_quantity_down' href=''> - </a>
								</div>
							</td>
							<td class='cart_total'>
								<p class='cart_total_price'>".$datos[$i]['Cantidad']*$datos[$i]['Precio']."</p>
							</td>
							<td class='cart_delete'>
								<a class='cart_quantity_delete' href=''><i class='fa fa-times' data-id='". $datos[$i]['Id']."'></i></a>
							</td>
						</tr>
							</tbody>";
				
			}
		}
				echo "</table></div></div>";
			
			?>

				
				
					
		
<?php

         $total=0;

for($i=0; $i<count($datos);$i++){
$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
}
$idUsuario=$_SESSION['id_cliente'];
$sql="SELECT * FROM `pv_cliente`,`pv_estado`,`pv_municipio`,`pv_colonia` WHERE id_cliente=".$idUsuario;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
             
      
            

echo "

	</section> <!--/#cart_items-->

	<section id='do_action'>
		<div class='container'>
			
			<div class='row'>
				
				<div class='col-sm-7 '>
					<div class='total_area'>
						<ul>
							<li>Nombre  <span>  ".$row['nombre_cliente'].' '.$row['ap_paterno_cliente']."</span></li>
							<li>Telefono <span>".$row['telefono']."</span></li>
							<li>Calle <span>".$row['calle']."</span></li>
							<li>Municipio <span>".$row['municipio']."</span></li>
							<li>Estado <span>".$row['estado']."</span></li>
							<li>Piezas <span>".count($datos)."</span></li>
							<li>Total <span>".$total."</span></li>
						</ul>
							
					</div>
				</div>
			</div>
		</div>
	</section>";
	 }
?>
	<footer id="footer"><!--Footer-->
		<?php include_once('header.php'); ?>
	</footer><!--/Footer-->


  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="scripts.js"></script>
  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
