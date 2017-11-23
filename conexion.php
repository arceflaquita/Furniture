<?php
//1: alfaweb,  0: localhost
$server = 0;
if($server) {
  $host = '45.40.164.98';
  $user = 'alumndb2';
  $pw = 'Al@umNd1';
  $db = 'furniture';
}else{
  $host = 'localhost';
  $user = 'root';
  $pw = '';
  $db = 'furniture';
}

$conn = new mysqli($host, $user, $pw, $db);
// Check connection
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
?>
