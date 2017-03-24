<?php
session_start();
?>
<html>
<head><title>WEBSITES</title><style>
body {background-color: white;}</style></head>
<body>
<br/><br/><br/>
<div style="text-align: right;margin-right: 10%">
<?php if($_SESSION['authuser']!='1'){
	
echo '<a href="login.php">LOG IN</a>';
}
else{
	echo '<a href="logout.php">LOG OUT </a>';
	echo '&nbsp&nbsp <a href="tabs.php">MAIN AREA </a>';
}
?>
</div>
<br/><br/>
<div style="text-align: center">
<img src="http://www.toptipsfeed.com/wp-content/uploads/2015/01/search-engines.png" alt="3D HTML Letters" width="375" height="218" >
</div>



<br/>
<div style="text-align: center;">
<form action="searchresult.php?count=0&count1=0&count2=0&count3=0&count4=0&count5=0" method="post">
<input type="text" name="name" style="text-align: center;width: 50%;"/>
<br/>
<input type="submit" name="submit" value="Search" style="margin-left: auto;margin-right: auto;width: 8%;" />
</form>
</div>
<div style="text-align: center;font-size: 125%">

<p > <?php if($_SESSION['authuser']!='1'){
	$num=0;
}
else{
	echo 'WELCOME ' . $_SESSION['username'];
}
?>
</p>
</div>
<?php
include 'include.php';
?>
</body>
</html>

