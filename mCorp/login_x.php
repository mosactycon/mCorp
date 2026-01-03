<?php 

session_start();

$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'mcorp_database');

$name = $_POST['username'];
$pass = $_POST['password'];

$s = " SELECT * FROM usertable WHERE username = '$name' && password = '$pass' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);


?>

<?php if($num == 1) :?>
 	<?php {
	while ($row = mysqli_fetch_assoc($result)) {
		$_SESSION['username'] = $name;
		$_SESSION['password'] = $row['password'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['kota'] = $row['kota'];
	}

	echo "<script>window.history.go(-2);</script>";

	// header('location:home.php');
} ?>
<?php else : ?>
	<?php {

	echo "<script>alert('Wrong Username or Password!.');window.location='login.php';</script>";	
} ?>
<?php endif ?>

