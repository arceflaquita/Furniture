<?php

  include_once('conexion.php');
$resultado="</br><select name='comboProvedor' id='comboProvedor' required='required'>
<option value=''>Selecciona un Provedor</option>";
$sql="select * from pv_provedor";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
              $resultado.=" <option value='".$row['id_provedor']."'>".$row['provedor']."</option>";
               
            } 
             $resultado.=" </select>";
 echo $resultado;
    
?>