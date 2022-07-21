<?php
session_start();


  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';
  
  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);
    $liker_username = $_SESSION['username'];

    $query_unlike = "DELETE FROM liketable WHERE id_project = '$id' && liker_username = '$liker_username' ";
    $result_unlike = mysqli_query($koneksi, $query_unlike);

    $query_unlike_update = "UPDATE usercorp SET jumlah_like=jumlah_like-1 WHERE id='$id' "; 
    $result_unlike_update = mysqli_query($koneksi, $query_unlike_update);

    echo "<script>alert('Anda baru saja me-unlike project ini');window.history.go(-1);</script>";



  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='home.php';</script>";
  } ;        
  ?>
