<html>
<head><title>REMOVED</title>
<style>body{background-color: white;}</style></head>
<body>
<div style="text-align: center;margin-top: 6%">

<?php
session_start();
if($_SESSION['authuser']!=1){
	echo 'invalid access';
	exit();
}


echo $_SESSION['username'];
$_SESSION['username']=$_SESSION['username'];
$_SESSION['authuser']=1;
$username1=$_GET['username2'];
echo $username;
$flag=0;
if($username1==""){
	$username1=$_POST['username1'];
	if($username1==""){
		//echo 'here';
		echo 'invalid access';
		exit();
	}
}
else{
	$flag=1;
	//echo 'yeah yeah';
}
$host="localhost";
 $username="root";
 $password="abhi123";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password)or die('server down');
 $db=mysql_select_db($databasename)or die('server down');
//echo 'yeah yeah2';
 if($flag==0){
 mysql_query("delete from websites.guest where username='$username1'")or die('invalid input');}
else{
	mysql_query("delete from websites.admin where username='$username1'")or die(mysql_error());
	//echo 'yeah yeah3';
}
$command="rm websites.sql";
system($command);
 $command="mysqldump  -u root -pabhi123 websites > websites.sql";
   system($command);

echo 'database modified';

?>
<br/><br/>
<a href="tabs.php">CLICK HERE TO GO BACK TO PREVIOUS PAGE</a>
</div>
</body>
</html>