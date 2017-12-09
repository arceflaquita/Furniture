<?php
include_once('conexion.php');
$cat = $_POST['cat'];
$resultado="</br><select name='comboProvedor' id='comboProvedor' required='required'>
<option value=''>Selecciona un Producto</option>";
$sql="select id_producto, producto from pv_producto where id_categoria = " . $cat;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
while($row=$result->fetch_assoc()){
  $resultado.=" <option value='".$row['id_producto']."'>".$row['producto']."</option>";

}
$resultado.=" </select>";
echo $resultado;
?>
