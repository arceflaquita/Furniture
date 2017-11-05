<?php
session_start();
include_once('conexion.php');

$name = $_POST['txtname'];
$firstname = $_POST['txtfirstname'];
$email = $_POST['txtemail'];
$password = $_POST['txtpassword'];
$p_hash = crypt($password, "manchitas");
$id_cliente = 0;
$sql = "CALL spInsCustomer('$email', '$p_hash','$name', '$firstname', @_id_cliente);";
//echo $sql;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
//var_dump($result);
$sql = "SELECT @_id_cliente as _id_cliente;";
//echo $sql;
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
//var_dump($result);
while($row = $result->fetch_assoc()) {
  $id_cliente = $row['_id_cliente'];
}
if($result) mysqli_free_result($result);
//echo "id_cliente: " . $id_cliente . "\n";
if($id_cliente == -1)
{
  $_SESSION['error_addCustomer'] = "El correo electronico ya existe por favor inicie sesion";
  return;
}

$_SESSION['email'] = $email;
$_SESSION['name'] = $name;
$_SESSION['id_categoria'] = 2;

header("Location: index.php");
return;

?>
