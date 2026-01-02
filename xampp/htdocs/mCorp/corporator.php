<?php
session_start();


  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['username'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $user = ($_GET["username"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM usercorp WHERE username='$user' ORDER BY jumlah_like DESC";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
      //  if (!count($data)) {
      if ($data === null) {
          echo "<script>alert('Anda belum mengupload Project! Silahkan upload minimal 1 project.');window.location='your_corp.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='home.php';</script>";
  }         
  ?>

  <?php 
      $username=$data['username'];

      $con = mysqli_connect('localhost','root');
      mysqli_select_db($con, 'mcorp_database');

      $s0 = " SELECT id, username, nama_project, deskripsi_project, kategori_project, harga_project, preview_project FROM usercorp WHERE username = '$username' order by jumlah_like DESC ";

      $result0 = mysqli_query($con, $s0);

?>  
      
<?php 
      $password=$data['password'];
      $s1 = " SELECT * FROM usertable WHERE username = '$username' && password = '$password' ";
      
      $result1 = mysqli_query($con, $s1);
      $row1 = mysqli_fetch_array($result1);

 ?>



<!DOCTYPE html>
<html>
  <head>
    <title>Laman Portofolio</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
   
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
        <h1><?php echo $data['username']; ?></h1>
      <center>

      <div>
        <table>
        
        <tr>
          <td>Username</td><td> : <?php echo $row1['username']; ?></td>
        </tr>
        <tr>
          <td>Nama</td><td> : <?php echo $row1['nama']; ?></td>
        </tr>
        <tr>
          <td>Email</td><td> : <?php echo $row1['email']; ?></td>
        </tr>
        <tr>
          <td>Kota</td><td> : <?php echo $row1['kota']; ?></td>
        </tr>

      </table>
      </div>



  <?php
          while ( $row0 = mysqli_fetch_array($result0)) 
        {
  ?>
    <div style="display: inline;">
     
      <div class="random_kotak" >

        
            <a href="project.php?id=<?php echo $row0['id']; ?>">
              <img src="preview_project/<?php echo $row0["preview_project"]; ?> " class="project_home">
            </a>

  <?php   
      $id_project = $row0['id'];
      $s_like = "SELECT like_count FROM liketable WHERE id_project = '$id_project' ";

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

        <br>

        <div style="display: flex; text-align: left; margin-left: 100px;">

        <?php if($num_like > 1) {?>

          <a style="margin-top: 17px; text-decoration: none; color: #1e1e28" href="project.php?id=<?php echo $row0['id']; ?>#liker"><span style="margin-top: 17px;"> <?php echo $num_like ?> Likes</span></a>

        <?php } else if($num_like >= 1) { ?>

          <a style="margin-top: 17px; text-decoration: none; color: #1e1e28;" href="project.php?id=<?php echo $row0['id']; ?>#liker"><span style="margin-top: 17px;"> <?php echo $num_like ?> Like</span></a>

        <?php } else { ?>

          <span style="margin-top: 17px; ">first to like!</span>

        <?php } ?>
            

            <?php if ($like_icon == 1) { ?> 

              <a style="margin-left: 100px;"

              <?php if(isset($_SESSION['username'])) { ?> href="unlike.php?id=<?php echo $row0['id']; ?> "

              <?php } else { ?> href="login_belum.php"

              <?php } ?>

              >
                <img style="width: 50px; " src="gambar/liked.png" >
              </a>

            <?php } else { ?> 

              <a style="margin-left: 100px;"

              <?php if(isset($_SESSION['username'])) { ?> href="like.php?id=<?php echo $row0['id']; ?> "

              <?php } else { ?> href="login_belum.php"

              <?php } ?>

              >
                <img style="width: 50px; " src="gambar/unliked.png" >
              </a>

            <?php } ?>

        </div>

      </div>
    </div>

    <?php
                 } ;
          ?>

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