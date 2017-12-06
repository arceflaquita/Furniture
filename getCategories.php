<?php
include_once('conexion.php');
$resultado='<ul class="nav navbar-nav collapse navbar-collapse">';
$sql="select * from pv_categoria";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
  while($row=$result->fetch_assoc()){
    $resultado .= '<li><a href="categories.php?cat=' . $row['id_categoria'] . '" class="active">' . $row['categoria'] . '</a></li>';
  }
  $resultado .= '</ul>';
echo $resultado;
?>
