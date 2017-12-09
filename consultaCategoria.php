<?php
include_once('conexion.php');
$resultado="<select name='comboCategoria' id='comboCategoria' required='required'>
<option value=''>Selecciona una Categoria</option>";
$sql="select * from pv_categoria";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
while($row=$result->fetch_assoc()){
  $resultado.=" <option value='".$row['id_categoria']."'>".$row['categoria']."</option>";
}
$resultado.=" </select> </br>";
echo $resultado;
?>
