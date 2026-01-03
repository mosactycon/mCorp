<?php
session_start();

// echo ($_SESSION['kota']);

  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Your Corp</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_yourcorp.css">

  </head>
  <body>

<ul class="horizontal gray">

     <?php if (isset($_SESSION['username'])):?>
      <li><span><a href="your_corp.php" class="yourCorp">&emsp;Manage Your Corp!&emsp;</a></span></li>
     <?php else : ?>
      <li><span><a href="login.php" class="yourCorp">&emsp;Manage Your Corp!&emsp;</a></span></li>
     <?php endif ?>

     <?php if (isset($_SESSION['username'])):?>
      <li><a class="efekGaris" href="logout.php">
        Log out
      </a></li>
     <?php else : ?>
      <li><a class="efekGaris" href=login.php target="">
        Log in
      </a></li>
    <?php endif ?>

    <?php if (isset($_SESSION['username'])):?>
      <li><a class="efekGaris" href="corporator.php?username=<?php echo $_SESSION['username']; ?>" target="">
          <?php echo ($_SESSION['username']); ?>
      </a></li> 
    <?php else : ?>
      <li><a class="efekGaris" href="signup.php" target="">
          Sign up
      </a></li>
    <?php endif ?>

      <a href="home.php"><li style="float:left"><span class="logo2"><span class="logo">MCorp</span> community</span></li></a>
  </ul> 

  <div class="header"></div>

    <center><h1>Project Data</h1><center>
    <center><a class="button_tambah" href="your_corp_tambah_produk.php">+ &nbsp; Add Project</a><center>
    <br/>
    <table class="table_yc">
      <thead>
        <tr>
          <th>No</th>
          <th>Project</th>
          <th>Description</th>
          <th>Category</th>
          <th>Value</th>
          <th>Preview</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      // $query = "SELECT * FROM produk ORDER BY id ASC";
      $name = ($_SESSION['username']);
      $pass = ($_SESSION['password']);

      $query = "SELECT * FROM usercorp WHERE username = '$name' && password = '$pass' ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_project']; ?></td>
          <td><?php echo substr($row['deskripsi_project'], 0, 20); ?>...</td>
          <td><?php echo $row['kategori_project']; ?></td>
          <td><?php echo $row['harga_project']; ?></td>
          <td style="text-align: center;"><img src="preview_project/<?php echo $row['preview_project']; ?>" style="height: 120px;"></td>
          <td>
              <a class="editTambah" href="your_corp_edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a>
              <a  class="editTambah" href="your_corp_proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>

    <br><br><br>

    <div class="footer"></div>

    <div class="footer2">
      <div style="margin: 0px 50px;">
      <ul class="footer-nav">
      <li><a href="#0" target="_blank"><small>Cookie policy</small></a></li>
      <li><a href="#0" target="_blank"><small>Terms of Service</small></a></li>
      <li><a href="#0" target="_blank"><small>Privacy policy</small></a></li>
      <li style="float:left"><a><small>&copy;<script>document.write(new Date().getFullYear());</script> Faris Mighwar</small></a>
      </ul>
      </div>
    </div>

  </body>
</html>