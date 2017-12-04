<?php
session_start();
include_once('conexion.php');
$email = $_SESSION['email'];
$nombre_contacto = $_POST['txtnombre_contacto'];
$ap_paterno_cliente = $_POST['txtap_paterno_cliente'];
$ap_materno_cliente = $_POST['txtap_materno_cliente'];
$new_email = $_POST['txtemail'];
$actualPass = $_POST['txtactualPass'];
$newPass = $_POST['txtnewPass'];
$confirmPass = $_POST['txtconfirmPass'];
/*echo "actualPass: " . $actualPass . ".\n";
echo "newPass: " . $newPass . ".\n";
echo $actualPass != '';*/
if(!empty($actualPass)){
  $_SESSION['cbPass'] = 1;
  if(empty($newPass)){
    $_SESSION['error_save_customer'] = "Captura el nuevo password";
    header("location:editCustomer.php");
    return;
  }

  if(empty($confirmPass)){
    $_SESSION['error_save_customer'] = "Confirma el nuevo password";
    header("location:editCustomer.php");
    return;
  }

  //echo "actualPass vacio";
  if( $newPass != $confirmPass ){
    $_SESSION['error_save_customer'] = "Los passwords nuevos no coincide";
    header("location:editCustomer.php");
    return;
  }
}

if(empty($actualPass)){
  $actualPass_hash = '';
}else{
  $actualPass_hash = crypt($actualPass, "manchitas");
}

if(empty($newPass)){
  $newPass_hash = '';
}else{
  $newPass_hash = crypt($newPass, "manchitas");
}

$sql = "CALL spSaveCustomer ('" . $email ."', '" . $nombre_contacto."', '" .
  $ap_paterno_cliente."', '" . $ap_materno_cliente."', '" . $new_email."', '" .
  $actualPass_hash."', '" . $newPass_hash."');";
//echo $sql;
$result = $conn->query($sql) or die ("Error: " . mysqli_error($conn));
//var_dump($result);
$row = mysqli_fetch_array($result);
//echo $row['sql_error'];
if($row['sql_error'] == ''){
  $_SESSION['error_save_customer'] = '';
  header("location:logout.php");
  return;
}else{
  //echo $row['sql_error'];
  $_SESSION['error_save_customer'] = $row['sql_error'];
  header("location:editCustomer.php");
  return;
}

/*
--resetear password a 'admin23'
update pv_usuario set password = 'maNFFVN3iSshg' where id_usuario=2;
*/
?>
