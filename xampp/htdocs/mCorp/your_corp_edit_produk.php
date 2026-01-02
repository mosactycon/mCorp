<?php
session_start();


  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM usercorp WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='your_corp.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='your_corp.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Project</title>
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

      <center>
        <h1>Edit Project <?php echo $data['nama_project']; ?></h1>
      <center>
      <form method="POST" action="your_corp_proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Project</label>
          <input type="text" name="nama_project" value="<?php echo $data['nama_project']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi_project" value="<?php echo $data['deskripsi_project']; ?>" />
        </div>
        <div>
          <label>Kategori</label>
         <input type="text" name="kategori_project" required=""value="<?php echo $data['kategori_project']; ?>" />
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga_project" required="" value="<?php echo $data['harga_project']; ?>"/>
        </div>
        <div>
          <label>Preview Project</label>
          <img src="preview_project/<?php echo $data['preview_project']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="preview_project" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah preview project</i>
        </div>
        <div>
         <button class="button_tambah" type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>

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