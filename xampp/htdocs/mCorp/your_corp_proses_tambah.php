<?php
session_start();




// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $user               = $_SESSION['username'];
  $pass               = $_SESSION['password'];
  
  $nama_project       = $_POST['nama_project'];
  $deskripsi_project  = $_POST['deskripsi_project'];
  $kategori_project   = $_POST['kategori_project'];
  $harga_project      = $_POST['harga_project'];
  $preview_project     = $_FILES['preview_project']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($preview_project != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $preview_project); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['preview_project']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$preview_project; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'preview_project/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO usercorp ( username, password, nama_project, deskripsi_project, kategori_project, harga_project, preview_project) VALUES ('$user', '$pass' ,'$nama_project', '$deskripsi_project', '$kategori_project', '$harga_project', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='your_corp.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi preview yang boleh hanya jpg, jpeg, dan png.');window.location='your_corp_tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO usercorp (username, password, nama_project, deskripsi_project, kategori_project, harga_project, preview_project) VALUES ('$user', '$pass' ,'$nama_project', '$deskripsi_project', '$kategori_project', '$harga_project', null)";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='your_corp.php';</script>";
                  }
}

 
