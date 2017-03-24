<?php


session_start();
$_SESSION['authuser']=0;
?>

<html>
<head>
	<title>LOGIN PORTAL</title><style>
body {background-color: white;}</style>
</head>
<body>
<br/><br/><br/>
<div style="text-align: right;margin-right: 5%">
<a href="search.php" name="logout" style="color:seagreen">HOME </a>
</div>

<br/>
<div style="text-align: center;font-size: 120%;margin-left:5%;margin-right:5%" >
<p style="color: red; font-size:90%">ONLY WEB-MASTERS AND ADMINS CAN LOG-IN. IF YOU ARE A WEB-MASTER AND WISH TO HAVE AN ACCOUNT CONTACT US WITH THE LINK PROVIDED BELOW.</p>
</div>
<br/><br/><br/>
<div style="text-align: center">
	<form  action="tabs.php" method="post" >
		<p> *
			<input type="text" name="user" placeholder="username" style="width:25%" />
		</p>
		<p>	*
			<input type="password" name ="pass" placeholder="password" style="width: 25%" />
		</p>
		<br/>
		<input type="radio" name="role" value="admin">admin
		<input type="radio" name="role" value="guest">guest
		<br/>
		<p>
		<input type="submit" name="submit" value="LOG-IN"/>
		</p>
		
		<input type="checkbox" name="remember" value="remember">remember me
		<br/>
	</form>
	</div>
	<br/><br/>
	<a href="contact.php" style="margin-left: 5%">CONTACT US</a>
	<a href="forgot.php" style="margin-right: 3%;margin-left: 55%">FORGOT YOUR PASSWORD ?</a>
	<?php
	include 'include.php';
	?>
</body>
</html>
