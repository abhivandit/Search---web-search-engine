
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
$main_url=$_POST['url'];
echo $main_url;
 	$host="localhost";
 $username="root";
 $password="abhi123";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password)or die('error');
 $db=mysql_select_db($databasename)or die('error2');
 mysql_query("delete from websites.master where url='$main_url'")or die(mysql_error());
 $command="rm websites.sql";
system($command);
 $command="mysqldump  -u root -pabhi123 websites > websites.sql";
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
