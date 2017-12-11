
<?php
include_once('conexion.php');
$resultado="<option value='0'>Seleccione un Estado</option>";
$sql="select * from pv_estado";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
  while($row=$result->fetch_assoc()){
    $resultado.=" <option value='".$row['id_estado']."'>".$row['estado']."</option>";
  }
 echo $resultado;
?>
