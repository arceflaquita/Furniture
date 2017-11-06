<?php

  include_once('conexion.php');
  $el_municipio = $_POST['municipio'];
$resultado="<option value='0'>Seleccione una Colonia</option>";
$sql="select * from pv_colonia where id_municipio=".$el_municipio;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
              $resultado.=" <option value='".$row['id_colonia']."'>".$row['colonia']."</option>";
               
            } 
             
 echo $resultado;
    
?>