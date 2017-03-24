<html>
<head><title>RESTORE</title>
<style>body{background-color: white;}</style></head>
<body>
<div style="text-align: center;margin-top: 6%">

<?php
session_start();
if($_SESSION['authuser']!=1){
	echo 'invalid access';
	exit();
}
?>
<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'abhi123';
   
   $backup_file = $dbname. '.gz';
  // $command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". "websites | gzip > $backup_file";
   $command="mysqladmin -u root -pabhi123 create websites";
   system($command);
   $command="mysqldump  -u root -pabhi123 websites < websites.sql";
   system($command);
   echo 'restored';
 //  $command="rm sample2.csv";
 //  system($command);
?>
<br/><br/>
<a href="tabs.php">CLICK HERE TO GO BACK TO PREVIOUS PAGE</a>
</div>
</body>
</html>




