<?php
session_start();


  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';
  
  
  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);
    $disukai = 1;
    // $jumlah_like = $jumlah_like++;
    $liker_username = $_SESSION['username'];
    
    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM liketable WHERE id_project='$id' && liker_username='$liker_username' ";
    $result = mysqli_query($koneksi, $query);
    



          // jika data gagal diambil maka akan tampil error berikut
          if(!$result){
          die ("Query Error: ".mysqli_errno($koneksi).
             " - ".mysqli_error($koneksi));
          }
          // mengambil data dari database
          $data = mysqli_fetch_assoc($result);
          // apabila data tidak ada pada database maka akan dijalankan perintah ini
          // if (!count($data)) {
          if ($data === null) {

              
              $query = "INSERT INTO liketable ( id_project, like_count, liker_username ) VALUES ('$id', '$disukai' ,'$liker_username')";
                      $result = mysqli_query($koneksi, $query);

              $query2 = "UPDATE usercorp SET jumlah_like=jumlah_like+1 WHERE id='$id' ";
                      $result2 = mysqli_query($koneksi, $query2);
                      

              echo "<script>alert('Terimakasih sudah memberi like');window.history.go(-1);</script>";

          //  } if(count($data)) {
          } else {

                echo "<script>alert('Anda sudah pernah memberi like pada project ini sebelumnya!');window.history.go(-1);</script>";
           }





  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='home.php';</script>";
  } ;        
  ?>
