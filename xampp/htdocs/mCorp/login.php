<!DOCTYPE html>
<html>
<head>
	<title>Log In Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
</head>
<body>


	<ul class="horizontal gray">
	  <a href="home.php"><li style="float:left"><span class="logo2"><span class="logo">MCorp</span> community</span></li></a>
	</ul>	

	<div class="header"></div>

	<div class="blok_login">
			<h1 class="h1__">Log in to MCorp</h1>
			<h1 class="h1">
				<span>Log in</span>
				<span> to</span>
				<span> MCorp</span>
			</h1>
		<div class="text_login content_login">

			<form action="login_x.php" method="post">
				<div>
					
					<label></label>
					<input type="text" name="username" placeholder="Username">
					<label></label>
					<input type="password" name="password" placeholder="Password">
					
				</div>
				<div>
					<input class="login_button" type="submit" value="Log In">
					<!-- <a href="">Forgot password</a> -->
				</div>
			</form>

			<div>
				<p class="belum_login">Belum memiliki akun?<a href="signup.php">Sign up</a></p>
			</div>

			<!-- <div>
				<p class="or"><span>or</span></p>
			</div>
				<input class="login_gmail_button" type="submit" value="Log in with Google"> -->


		</div>
		<div class="image_login content_login"><h2>Gambar</h2></div>
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

<script type="text/javascript" src="login_x.php"></script>


</body>
</html>