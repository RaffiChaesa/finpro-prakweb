<?php  
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "wisatadb";

  $connect = new mysqli($hostname, $username, $password, $database);
  if($connect->connect_error){
    die('Sorry, connection failed: '.$connect->connect_error);
  }

?>