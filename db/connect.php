<?php
$con = new mysqli("localhost","root","","bandienthoai");

if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}




$con -> set_charset("utf8");

echo  $con -> character_set_name();


?>