<?php

session_start();

function verificar_login($mail, $password, &$resp)
{
  include_once('conexion.php');
  $sql = "CALL spCheckUser ('" . $mail ."', '" . $password."');";
  //echo $sql;
  $result = $conn->query($sql);
  //var_dump($result);
  $count = 0;
  while($row = $result->fetch_assoc()) {
    $count++;
    $resp = $row;
  }
  return $count;
}

$mail =  $_POST['txtemail'];
$password = $_POST['txtpassword'];
$p_hash = crypt($password, "manchitas");
//echo $p_hash;
if(verificar_login($mail,$p_hash,$resp) == 1)
{
  $_SESSION['mail'] = $mail;
  $_SESSION['id_categoria'] = $resp['id_categoria'];
  $_SESSION['name'] = $resp['nom_user'];
  $_SESSION['error_login'] = "";
  if($resp['id_categoria'] == '1' || $resp['id_categoria'] == '3'){
    header("Location: admin.php");
  }
  if($resp['id_categoria'] == '2'){
    header("Location: index.php");
  }
}else{
  $_SESSION['error_login'] = "Su usuario es incorrecto, intente nuevamente.";
  header("location:login.php");
}

?>
