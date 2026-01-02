<?php 

session_start();

$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'mcorp_database');

$nama = $_POST['nama'];
$email = $_POST['email'];
$kota = $_POST['kota'];
$user = $_POST['username'];
$pass = $_POST['password'];


$s = " select * from usertable where username = '$user' ";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "<script>alert('Username tidak tersedia, silahkan gunakan yang lainnya!');window.location='signup.php';</script>";
}else{
	$reg= " insert into usertable(nama, email, kota, username , password) values ('$nama', '$email', '$kota', '$user' , '$pass')";
	mysqli_query($con, $reg);
	echo "<script>alert('Sign Up berhasil, silahkan login.');window.location='login.php';</script>";
	
}
?>
