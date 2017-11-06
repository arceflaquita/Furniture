<?php

  include_once('conexion.php');
  $el_colonia = $_POST['colonia'];
$resultado="<option value='0'>Seleccione un codigo Postal</option>";
$sql="select * from pv_cp where id_colonia=".$el_colonia;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
              $resultado.=" <option value='".$row['id_cp']."'>".$row['cp']."</option>";
               
            } 
             
 echo $resultado;
    
?>