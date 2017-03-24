

<html>
<head><title>REMOVAL</title>
<style>body{background-color: white;}</style></head>
<body>
<div style="text-align: center;margin-top: 6%">
<?php
session_start();
if($_SESSION['authuser']!=1){
	echo 'invalid access';
	exit();
}
else{
	//echo 'yeahyeah';
}

if(isset($_POST['submit'])){
$_SESSION['authuser']=1;

//echo 'yeah yeah2';
$username1=$_POST['user'];
$password1=$_POST['pass'];
$role=$_POST['role1'];
echo $main_url;
 	$host="localhost";
 $username="root";
 $password="";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password)or die('error');
 $db=mysql_select_db($databasename)or die('error2');

 if($role=='admin'){
 mysql_query("insert into websites.admin values ('$username1','$password1')")or die(mysql_error());}
 else{
 	
 	
 	mysql_query("insert into websites.guest values ('$username1','$password1')")or die(mysql_error());

 }
$command="rm websites.sql";
system($command);
 $command="mysqldump  -u root -ppassword websites > websites.sql";
   system($command);
 echo 'DATABASE MODIFIED';
}

 else{
 	echo 'invalid access';
 }
?>
<br/><br/>
<a href="tabs.php">CLICK HERE TO GO BACK TO PREVIOUS PAGE</a>
</div>
</body>
</html>