<?php 
session_start();

$server = "localhost";
$dbName = "blog";
$dbUser = "root";
$dbPassword ="";

 $con =  mysqli_connect($server,$dbUser,$dbPassword,$dbName);

  if(!$con){
      echo "Error : ".mysqli_connect_error();
  }


?>