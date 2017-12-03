<?php

?>

   <?php

session_start();

   function pdf(){
   $print="
<img class='logo' src='images/home/logo.png' a>
</br>
<center><h1>Resivo de Compra de articulos</h1></center>
   <div class='table-responsive cart_info'>";
   $print=$print."<table class='table table-condensed'>
					<thead>
						<tr class='cart_menu'>
							<td class='image'>Imagen</td>
							<td class='description'>Nombre</td>
							<td class='price'>Precio</td>
							<td class='quantity'>Cantidad</td>
							<td class='total'>Total</td>
							<td></td>
						</tr>
					</thead>

					";
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];

			$total=0;
			for($i=0;$i<count($datos);$i++){

				 $print=$print. "
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

									<input class='cart_quantity_input' type='text' value='".$datos[$i]['Cantidad']."'>

								</div>
							</td>
							<td class='cart_total'>
								<p class='cart_total_price'>$".$datos[$i]['Cantidad']*$datos[$i]['Precio']."</p>
							</td>
							<td class='cart_delete'>
								<a class='cart_quantity_delete' href=''><i class='fa fa-times' data-id='". $datos[$i]['Id']."'></i></a>
							</td>
						</tr>
							</tbody>

					";

			}
		}
				 $print=$print. "</table></div></div>";

         $total=0;

for($i=0; $i<count($datos);$i++){
$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
}
$idUsuario=$_SESSION['id_cliente'];
include_once('conexion.php');
$sql="SELECT * FROM `pv_cliente`,`pv_estado`,`pv_municipio`,`pv_colonia` WHERE id_cliente=".$idUsuario;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){




 $print=$print. "
	</section> <!--/#cart_items-->

	<section id='do_action'>
		<div class='container'>

			<div class='row'>

				<div class='col-sm-7 '>
					<div class='total_area'>
						<ul>
							<li>Nombre:  <span>  ".$row['nombre_cliente'].' '.$row['ap_paterno_cliente']."</span></li>
							<li>Telefono: <span>".$row['telefono']."</span></li>
							<li>Calle: <span>".$row['calle']."</span></li>
							<li>Municipio: <span>".$row['municipio']."</span></li>
							<li>Estado: <span>".$row['estado']."</span></li>
							<li>Piezas: <span>".count($datos)."</span></li>
							<li>Total: <span> $".$total."</span></li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</section></page>";
	 }
return $print;
	}

?>



<?php
require_once('./mpdf/mpdf.php');

 $prefijo = substr(md5(uniqid(rand())), 0, 6);
$mpdf = new mPDF('c','A4');
$css=file_get_contents('css/main.css');
$css2=file_get_contents('css/bootstrap.min.css');
$mpdf->writeHTML($css2,1);
$mpdf->writeHTML($css,1);
$mpdf->writeHTML(pdf());
$mpdf->Output($prefijo.'report.pdf','I');

?>
