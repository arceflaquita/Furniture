<?php

 include_once('conexion.php');
$idProvedor=$_GET['idProvedor'];



$sql = "CALL deleteProvedor($idProvedor);";

$result = $conn->query($sql) or die("error: " . mysqli_error($conn));






header("Location: searchProvedor.php");

?>