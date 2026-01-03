<?php
// session_start();

// echo ($_SESSION['username']);

  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "mcorp_database"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Connection with database failed:".mysql_connect_error());
  }
?>