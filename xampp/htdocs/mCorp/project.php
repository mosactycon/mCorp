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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='home.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='home.php';</script>";
  }         
  ?>

<?php 
      $con = mysqli_connect('localhost','root');
      mysqli_select_db($con, 'mcorp_database');

      // $s_urutan = " SELECT like_count FROM liketable "

      $s0_project = " SELECT id, username, nama_project, deskripsi_project, kategori_project, harga_project, preview_project, jumlah_like FROM usercorp WHERE id = '$id' ";
      $result0_project = mysqli_query($con, $s0_project);


?>  


<?php 
      $row0_project = mysqli_fetch_array($result0_project)

 ?>

<?php   
      $id_project = $row0_project['id'];
      $s_like = "SELECT like_count, liker_username FROM liketable WHERE id_project = '$id_project' ";

      $result_like = mysqli_query($con, $s_like);

      $num_like = mysqli_num_rows($result_like);
 ?>

<?php 
      if (isset($_SESSION['username'])) {
        $liker_username = $_SESSION['username'];
      } else {
        $liker_username = 'belum_login';
      }
      

      $s_like_icon = " SELECT id_project , liker_username FROM liketable WHERE id_project = '$id_project' && liker_username = '$liker_username' ";

      $result_like_icon = mysqli_query($con, $s_like_icon);

      // $like_icon = mysqli_fetch_assoc($result_like_icon);
      $like_icon = mysqli_num_rows($result_like_icon);

 ?>

  <!DOCTYPE html>
<html>
  <head>
    <title>Laman Project</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
 <!--    <link rel="stylesheet" type="text/css" href="css/style_yourcorp.css"> -->
   
  </head>
  <body>

      <ul class="horizontal gray">

         <?php if (isset($_SESSION['username'])):?>
          <li><span><a href="your_corp.php" class="yourCorp">&emsp;Manage Your Corp!&emsp;</a></span></li>
         <?php else : ?>
          <li><span><a href="login_belum.php" class="yourCorp">&emsp;Manage Your Corp!&emsp;</a></span></li>
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
        <h1><?php echo $data['nama_project']; ?></h1>
      <center>

      <div class="blok">

        <div class="image content">
              <img src="preview_project/<?php echo $data["preview_project"]; ?> " class="project_project">
        </div>

        <div class="text content">
          <table>
            <tr>
              <th colspan="2"><?php echo $data['nama_project'] ?></th>
            </tr>
            <tr>
              <td>Desc.</td> <td>: <?php echo $data['deskripsi_project'] ?></td>
            </tr>
            <tr>
              <td>Category</td> <td>: <?php echo $data['kategori_project'] ?></td>
            </tr>
            <tr>
              <td>Price</td> <td>: Rp <?php echo number_format($data['harga_project'],0,',','.'); ?></td>

            </tr>
            <tr>
              <td>Corporator</td> <td>: <a href="corporator.php?username=<?php echo $data['username']; ?>"> @<?php echo $data['username'] ?></a> </td>
            </tr>
            <tr>
              <td>
                
        <?php if($num_like > 1) {?>

          <a style="margin-top: 17px; text-decoration: none; color: #1e1e28" href="#liker"><span style="margin-top: 17px;"> <?php echo $num_like ?> Likes</span></a>

        <?php } else if($num_like >= 1) { ?>

          <a style="margin-top: 17px; text-decoration: none; color: #1e1e28;" href="#liker"><span style="margin-top: 17px;"> <?php echo $num_like ?> Like</span></a>

        <?php } else { ?>

          <span style="margin-top: 17px; ">first to like!</span>

        <?php } ?>

              </td>
              <td>
                
                <?php if ($like_icon == 1) { ?> 

                  <a style="margin-left: 100px;"

                  <?php if(isset($_SESSION['username'])) { ?> href="unlike.php?id=<?php echo $row0_project['id']; ?> "

                  <?php } else { ?> href="login_belum.php"

                  <?php } ?>

                  >
                    <img style="width: 50px; " src="gambar/liked.png" >
                  </a>

                <?php } else { ?> 

                  <a style="margin-left: 100px;"

                  <?php if(isset($_SESSION['username'])) { ?> href="like.php?id=<?php echo $row0_project['id']; ?> "

                  <?php } else { ?> href="login_belum.php"

                  <?php } ?>

                  >
                    <img style="width: 50px; " src="gambar/unliked.png" >
                  </a>

                <?php } ?>

              </td>
            </tr>
          </table>
        </div>
        
      </div>

      <div id="liker">
        
          <h2>Liked By :</h2>

        <?php 

        $s_liker = " SELECT liker_username FROM liketable WHERE id_project = '$id_project' ORDER BY liker_username ASC ";

        $result_liker = mysqli_query($con, $s_liker);

        while ( $row_liker = mysqli_fetch_array($result_liker)) { 

          $liker = $row_liker['liker_username'];
          $s_cek_liker = " SELECT username FROM usercorp WHERE username = '$liker' ";
          $result_cek_liker = mysqli_query($con, $s_cek_liker);
          $cek_liker = mysqli_num_rows($result_cek_liker);

          ?>

            <?php if($cek_liker >= 1) {?>

              <ul><a href="corporator.php?username=<?php echo $row_liker['liker_username']; ?> "><?php echo $row_liker['liker_username']; ?></a></ul>

            <?php } else { ?>

              <ul><span><?php echo $row_liker['liker_username']; ?></span></ul>

            <?php } ?>

        <?php }; ?>

      </div>


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