<?php
session_start();
include('conexion.php');
$arreglo=$_SESSION['carrito'];
$idUsuario=$_SESSION['id_cliente'];
$total=0;
for($i=0; $i<count($arreglo);$i++){
  $total=($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio'])+$total;
}
$sql = "INSERT INTO pv_venta(feha, monto, id_cliente, id_proceso) VALUES (curdate(),$total,$idUsuario,1)";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
$sql = "Select max(folio) as folio from pv_venta;";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
$folio = $row['folio'];
for($i=0; $i<count($arreglo);$i++){
  $sql = "INSERT INTO pv_detalle_venta( fecha, precio_venta, cantidad, folio, id_producto)
  VALUES (curdate(),".$arreglo[$i]['Precio'].",".$arreglo[$i]['Cantidad'].", " . $folio . ",".$arreglo[$i]['Id'].");";
  $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
}

$_SESSION['folio'] = $folio;
function pdf(){
  include('conexion.php');
  $folio = $_SESSION['folio'];
  $idCliente = $_SESSION['id_cliente'];
  $sql="SELECT nombre_cliente, ap_paterno_cliente, ifnull(ap_materno_cliente, '') as ap_materno_cliente, telefono, "
  . " calle, numero_exterior, colonia, municipio, estado, codigo_postal "
  . "FROM pv_cliente c inner join pv_estado e on c.id_estado=e.id_estado "
  . "inner join pv_municipio m on c.id_municipio = m.id_municipio WHERE c.id_cliente=".$idCliente;
  $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
  $row=$result->fetch_array();
  $print = "<table>
  <tr>
  <td><img class='logo' src='images/home/logo.png' width='250px'></td>
  <td>
    <table class='direccion'>
    <tr><td>Direccion:</td></tr>
    <tr><td>935 W. Webster Ave New Streets Chicago, IL 60614, NY</td></tr>
    <tr><td>Newyork USA</td></tr>
    <tr><td>Mobile: +2346 17 38 93</td></tr>
    <tr><td>Fax: 1-714-252-0026</td></tr>
    <tr><td>Email: info@Furniture.com</td></tr>
    </table>
  </td>
  <td width='150px'>
  </td>
  <td>
    <table border='1'>
    <tr><th>Fecha</th></tr>
    <tr><td>" . date("d/M/y") . "</td></tr>
    </table>
  </td>
  <td>
    <table border='1'>
    <tr><th>Factura</th></tr>
    <tr><td>" . $folio . "</td></tr>
    </table>
  </td>
  </tr>
  </table><br/><br/>";
  $print .= "
  <table border='1' width='840px'>
  <tr colspan='2'><td><center>Cliente</center><td></tr>
  <tr>
  <td width='420px'>
    <p>NOMBRE O RAZON SOCIAL: " . $row['nombre_cliente'] . " " . $row['ap_paterno_cliente'] . " " . $row['ap_materno_cliente'] .  "</p>
    <p>RFC: AEZG911123</p>
  </td>
  <td width='420px'>
    <p>DIRECCION: </p>
    <p>Calle: " . $row['calle'] . " Num. " . $row['numero_exterior'] .  "</p>
    <p>Colonia: " . $row['colonia'] . "</p>
    <p>Municipio: " . $row['municipio'] . "</p>
    <p>Estado: " . $row['estado'] . "</p>
    <p>C.P.: " . $row['codigo_postal'] . "</p>
  </td>
  </tr>
  </table><br/><br/>";
  $print .= "<table border='1' width='840px'>
  <tbody>
  <tr>
  <td>
  <table width='840px'>
  <thead border='1'>
    <tr class='cart_menu'>
      <th class='quantity'>Cantidad</th>
      <th class='description'>Nombre</th>
      <th class='price'>Precio Unitario</th>
      <th class='total'>Importe</th>
    </tr>
  </thead>";
	$total=0;
	if(isset($_SESSION['carrito'])){
  	$datos=$_SESSION['carrito'];
  	$total=0;
    $count = count($datos);
  	for($i=0;$i< $count;$i++){
		$print=$print. "
		<tr>
      <td width='200px'>
        ".$datos[$i]['Cantidad']."
      </td>
			<td width='240px'>
				".$datos[$i]['Nombre']."
			</td>
			<td width='200px'>
				$ ". number_format($datos[$i]['Precio'], 2) ."
			</td>
			<td width='180px' align='right'>
				$ ". number_format($datos[$i]['Cantidad']*$datos[$i]['Precio'], 2) ."
			</td>
		</tr>";
  	}
    for($i=$count;$i < 15;$i++){
      $print=$print."<tr colspan='4'><td height='30'></td></tr>";
    }
  }
  $print.="</table>
  </td>
  </tr>
  </tbody>
  </table><br/><br/>";
  $total=0;
  for($i=0; $i<count($datos);$i++){
    $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
  }
  $subtotal = $total / 1.16;
  $iva = $total - $subtotal;
  $print.= "<table width='840' border='1'>
  <tr>
    <td width='600'></td>
    <td border='1'>Total</td>
  </tr>
  <tr>
    <td></td>
    <td>
      <table>
        <tr><td>Subtotal: </td><td width='160'  align='right'> $ " . number_format($subtotal, 2) . "</td></tr>
        <tr><td>IVA:  </td><td width='160'  align='right'> $ " . number_format($iva, 2) . "</td></tr>
        <tr><td>Total:  </td><td width='160'  align='right'> $ " . number_format($total, 2) . "</td></tr>
      </table>
    </td>
  </tr>
  </table>
  ";
  return $print;
}
ini_set("pcre.backtrack_limit", "10000000");
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

//version 7.1.9
//require_once __DIR__ . '/vendor/autoload.php';
//$mpdf = new \Mpdf\Mpdf();

include("mpdf-5.3.0/mpdf.php");
$mpdf=new mPDF();

$css=file_get_contents('css/factura.css');
$mpdf->writeHTML($css,1);
$pdf = pdf();
$mpdf->writeHTML($pdf);
$mpdf->Output('facturas/factura_' . $folio . '.pdf' ,'F'); //crea el archivo
include('conexion.php');
$folio = $_SESSION['folio'];
$idCliente=$_SESSION['id_cliente'];
$sql="SELECT nombre_cliente, ap_paterno_cliente, ifnull(ap_materno_cliente, '') as ap_materno_cliente, telefono, email "
. "FROM pv_cliente c inner join pv_estado e on c.id_estado=e.id_estado "
. "inner join pv_usuario u on u.id_cliente = c.id_cliente "
. "inner join pv_municipio m on c.id_municipio = m.id_municipio WHERE c.id_cliente=".$idCliente;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
$row=$result->fetch_array();
//envia correo
$subject = "Furniture - factura";
$message = "Adjuntamos su factura de la compra realizada:\n" .
  "\nNombre: " . $row['nombre_cliente'] . " " . $row['ap_paterno_cliente'] . " " . $row['ap_materno_cliente'] .
  "\nTelefono: " . $row['telefono'] .
  "\nCorreo: " . $row['email'];
$mailto = $row['email'];
$filename = 'factura_' . $folio . ".pdf";
$path = '/facturas';
$file = getcwd() . $path . "/" . $filename;
$content = file_get_contents($file);
$content = chunk_split(base64_encode($content));
$separator = md5(time());
// carriage return type (RFC)
//$eol = "\r\n";
$eol = PHP_EOL;
// main header (multipart mandatory)
$headers  = "From: alfacomx@p3nlhg630.shr.prod.phx3.secureserver.net".$eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Reply-To: furnitinfo@gmail.com" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
$headers .= "This is a MIME encoded message." . $eol. $eol;
// message
$body = "--" . $separator . $eol;
$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol. $eol;
$body .= $message . $eol;
// attachment
$body .= "--" . $separator . $eol;
$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
$body .= "Content-Transfer-Encoding: base64" . $eol;
$body .= "Content-Disposition: attachment" . $eol. $eol;
$body .= $content . $eol;
$body .= "--" . $separator . "--";
mail($mailto, $subject, $body, $headers);
$mpdf->Output('facturas/factura_' . $folio . '.pdf' ,'I');
?>
