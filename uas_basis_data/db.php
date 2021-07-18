<?php

$hari_ini = date("Y-m-d");
$con = mysqli_connect("localhost","root","","sugih_311910736");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
?>