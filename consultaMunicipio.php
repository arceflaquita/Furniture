<?php

  include_once('conexion.php');
  $el_estado = $_POST['estado'];
$resultado="<option value='0'>Seleccione un Municipio</option>";
$sql="select * from pv_municipio where id_estado=".$el_estado;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
              $resultado.=" <option value='".$row['id_municipio']."'>".$row['municipio']."</option>";
               
            } 
             
 echo $resultado;
    
?>