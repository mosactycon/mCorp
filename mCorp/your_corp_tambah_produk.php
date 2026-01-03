<?php
session_start();

// echo ($_SESSION['username']);


  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Project</title>
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
      <li><a class="efekGaris" href="corporator.php?username=<?php echo $_SESSION['username']; ?>"target="">
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
        <h1>Add Project</h1>
      <center>
      <form method="POST" action="your_corp_proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Project Name</label>
          <input type="text" name="nama_project" autofocus="" required="" />
        </div>
        <div>
          <label>Description</label>
         <input type="text" name="deskripsi_project" />
        </div>
        <div>
          <label>Category</label>
         <input type="text" name="kategori_project" required="" />
        </div>
        <div>
          <label>Value</label>
         <input type="text" name="harga_project" required="" />
        </div>
        <div>
          <label>Preview Project</label>
         <input type="file" name="preview_project" required="" />
        </div>
        <div>
         <button class="button_tambah" type="submit">Save Project</button>
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