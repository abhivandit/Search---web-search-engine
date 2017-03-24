<html>
<head><title>ENGINE</title>
<style>body{background-color: white;}</style></head>
<body>
<div style="text-align: center;margin-top: 6%">

<?php
session_start();
if($_SESSION['authuser']!=1){
	echo 'invalid access';
	exit();
}
if(isset($_POST['submit'])){


$_SESSION['authuser']=1;
$count=$_GET['count'];
if($count==1){
	$uploaddir = '/var/www/html/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);
$file = fopen($_FILES['userfile']['name'], 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements

	
		$main_url=$line[0];
		$bgcolor=$line[1];
		$userdesc=$line[3];
		$topic=$line[2];
		$str = file_get_contents($main_url);



 
 // Gets WebpagXQze Title
 if(strlen($str)>0)
 {
  $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
  preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
  $title=$title[1];
 }
	
 // Gets
 $description= file_get_contents($main_url);
//yha change kro
 //echo $description;
 $doc = new DOMDocument; 
 $doc->loadHTML($str); 
 
 $items = $doc->getElementsByTagName('a'); 
 $items2 =$doc->getElementsByTagName('p');
 $items3= $doc->getElementsByTagName('meta');
 $items4 =$doc->getElementsByTagName('img');
 $data1="";
 $combineddata="";
 $num=0;
 foreach($items2 as $value){

 	$combineddata1[]= ($value -> nodeValue);
}
$combineddata=implode("  ",$combineddata1);
//echo $combineddata;
 foreach($items3 as $value){
  $attrs = $value->attributes;   
   $string=$attrs->getNamedItem('name')-> nodeValue;
   if($string=='description'){
   	$sec_url[]=$attrs->getNamedItem('content')-> nodeValue;
   }
}
$description=implode(" ",$sec_url);

 foreach($items4 as $value){
 	//echo $value;
  $attrs = $value->attributes;   
   $sec_urlimg[]=$attrs->getNamedItem('src')-> nodeValue;
   $sec_urlalt[]=$attrs->getNamedItem('alt')-> nodeValue;
 
}
print_r($sec_urlimg);
//rint_r($sec_urlimg);
echo "!1";
echo $description;
//echo $data1;
//echo $combineddata;
//print_r($sec_urlimg);

 foreach($items as $value) 
 { 
$sec_url2[]= $value -> nodeValue;

  $attrs = $value->attributes; 
  
  $sec_url[]=$attrs->getNamedItem('href')->nodeValue;
 }
//print_r($sec_url2);
 // Store Data In Database
 $host="localhost";
 $username="root";
 $password="abhi123";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password)or die('error');
 $db=mysql_select_db($databasename)or die('error2');
 
 //echo $bgcolor.$userdesc.$topic; 
// echo $main_url;
  $score=0;
 $num=0;
 //$query='insert into master values("'.$main_url.'","'.$bgcolor.'","'.$description.'","'.'0,"'.$title.'","'.$userdesc.'","'.$topic.'")';
//echo 'yha tk';
   $combineddata = mysql_real_escape_string(htmlspecialchars($combineddata));
 //echo $combineddata;


 mysql_query("insert into master values('$main_url','$bgcolor','$combineddata','$score','$description','$title','$userdesc','$topic')")or die(mysql_error());//score
 //$size=sizeof($all_links);
 //echo $size;
 //print_r($all_links);

 //mysql_query("insert into webpage_details values('$main_url','$title','$combineddata','$all_links')");

 $combineddata = mysql_real_escape_string(htmlspecialchars($combineddata));
$combineddata=metaphone($combineddata);
$title=metaphone($title);
echo $title;
$userdesc=metaphone($userdesc);
$topic=metaphone($topic);
$description=metaphone($description);
//echo $combineddata;
mysql_query("insert into websites.metaphonicdata values('$main_url','$bgcolor','$combineddata','$score','$description','$title','$userdesc','$topic')")or die(mysql_error());



//echo $size;
//print_r($sec_urlimg);

for( $i=0;$i<$size;$i++){

	mysql_query("insert into websites.images values('$main_url','$sec_urlimg[$i]','$sec_urlalt[$i]')")or die(mysql_error())


;}
$size=sizeof($sec_url);
for($i=0;$i<$size;$i++){
	mysql_query("insert into links values('$main_url','$sec_url[$i]','$sec_url2[$i]')");
}


//images alt/url link linkcontent links /metaphonicdata
$command="rm websites.sql";
system($command);
 $command="mysqldump  -u root -pabhi123 websites > websites.sql";
   system($command);

  print_r($line);
}
fclose($file);

print "</pre>";
}
 else if($count==0){
 	$main_url=$_POST['url'];
 $str = file_get_contents($main_url);



 
 // Gets WebpagXQze Title
 if(strlen($str)>0)
 {
  $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
  preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
  $title=$title[1];
 }
	
 // Gets
 $description= file_get_contents($main_url);
//yha change kro
 //echo $description;
 $doc = new DOMDocument; 
 $doc->loadHTML($str); 
 
 $items = $doc->getElementsByTagName('a'); 
 $items2 =$doc->getElementsByTagName('p');
 $items3= $doc->getElementsByTagName('meta');
 $items4 =$doc->getElementsByTagName('img');
 $data1="";
 $combineddata="";
 $num=0;
 foreach($items2 as $value){

 	$combineddata1[]= ($value -> nodeValue);
}
$combineddata=implode("  ",$combineddata1);
//echo $combineddata;
 foreach($items3 as $value){
  $attrs = $value->attributes;   
   $string=$attrs->getNamedItem('name')-> nodeValue;
   if($string=='description'){
   	$sec_url[]=$attrs->getNamedItem('content')-> nodeValue;
   }
}
$description=implode(" ",$sec_url);

 foreach($items4 as $value){
 	//echo $value;
  $attrs = $value->attributes;   
   $sec_urlimg[]=$attrs->getNamedItem('src')-> nodeValue;
   $sec_urlalt[]=$attrs->getNamedItem('alt')-> nodeValue;
 
}
//print_r($sec_urlimg);
//rint_r($sec_urlimg);
//echo "!1";
//echo $description;
//echo $data1;
//echo $combineddata;
//print_r($sec_urlimg);

 foreach($items as $value) 
 { 
$sec_url2[]= $value -> nodeValue;

  $attrs = $value->attributes; 
  
  $sec_url[]=$attrs->getNamedItem('href')->nodeValue;
 }
//print_r($sec_url2);
 // Store Data In Database
 $host="localhost";
 $username="root";
 $password="";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password)or die('error');
 $db=mysql_select_db($databasename)or die('error2');
 $bgcolor=$_POST['bgcolor'];
 $userdesc=$_POST['userdesc'];
 $topic=$_POST['topic'];
 //echo $bgcolor.$userdesc.$topic; 
// echo $main_url;
  $score=0;
 $num=0;
 //$query='insert into master values("'.$main_url.'","'.$bgcolor.'","'.$description.'","'.'0,"'.$title.'","'.$userdesc.'","'.$topic.'")';
//echo 'yha tk';
   $combineddata = mysql_real_escape_string(htmlspecialchars($combineddata));
 //echo $combineddata;


 mysql_query("insert into master values('$main_url','$bgcolor','$combineddata','$score','$description','$title','$userdesc','$topic')")or die(mysql_error());//score
 //$size=sizeof($all_links);
 //echo $size;
 //print_r($all_links);

 //mysql_query("insert into webpage_details values('$main_url','$title','$combineddata','$all_links')");

 $combineddata = mysql_real_escape_string(htmlspecialchars($combineddata));
$combineddata=metaphone($combineddata);
echo $title;
$title=metaphone($title);
echo $title;
$topic=metaphone($topic);
$userdesc=metaphone($userdesc);
$description=metaphone($description);
//echo $combineddata;
mysql_query("insert into websites.metaphonicdata values('$main_url','$bgcolor','$combineddata','$score','$description','$title','$userdesc','$topic')")or die(mysql_error());



$size=sizeof($sec_urlimg);
//echo $size;
//print_r($sec_urlimg);

for( $i=0;$i<$size;$i++){

	mysql_query("insert into websites.images values('$main_url','$sec_urlimg[$i]','$sec_urlalt[$i]')")or die(mysql_error())


;}
$size=sizeof($sec_url);
for($i=0;$i<$size;$i++){
	mysql_query("insert into links values('$main_url','$sec_url[$i]','$sec_url2[$i]')");
}
$command="rm websites.sql";
system($command);
 $command="mysqldump  -u root -pabhi123 websites > websites.sql";
   system($command);
}
else if($count==2){

 	$previousurl=$_POST['url'];
 	if($previousurl==""){
 		echo 'invalid  data';
 		exit();
 	}
 	$host="localhost";
 $username="root";
 $password="";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password)or die('error');
 $db=mysql_select_db($databasename)or die('error2');
 mysql_query("delete from websites.master where url='$previousurl'")or die("invalida argument");


 	$main_url=$_POST['curl'];
 $str = file_get_contents($main_url);



 
 // Gets WebpagXQze Title
 if(strlen($str)>0)
 {
  $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
  preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
  $title=$title[1];
 }
	
 // Gets
 $description= file_get_contents($main_url);
//yha change kro
 //echo $description;
 $doc = new DOMDocument; 
 $doc->loadHTML($str); 
 
 $items = $doc->getElementsByTagName('a'); 
 $items2 =$doc->getElementsByTagName('p');
 $items3= $doc->getElementsByTagName('meta');
 $items4 =$doc->getElementsByTagName('img');
 $data1="";
 $combineddata="";
 $num=0;
 foreach($items2 as $value){

 	$combineddata1[]= ($value -> nodeValue);
}
$combineddata=implode("  ",$combineddata1);
//echo $combineddata;
 foreach($items3 as $value){
  $attrs = $value->attributes;   
   $string=$attrs->getNamedItem('name')-> nodeValue;
   if($string=='description'){
   	$sec_url[]=$attrs->getNamedItem('content')-> nodeValue;
   }
}
$description=implode(" ",$sec_url);

 foreach($items4 as $value){
 	//echo $value;
  $attrs = $value->attributes;   
   $sec_urlimg[]=$attrs->getNamedItem('src')-> nodeValue;
   $sec_urlalt[]=$attrs->getNamedItem('alt')-> nodeValue;
 
}
//print_r($sec_urlimg);
//rint_r($sec_urlimg);
//echo "!1";
//echo $description;
//echo $data1;
//echo $combineddata;
//print_r($sec_urlimg);

 foreach($items as $value) 
 { 
$sec_url2[]= $value -> nodeValue;

  $attrs = $value->attributes; 
  
  $sec_url[]=$attrs->getNamedItem('href')->nodeValue;
 }
//print_r($sec_url2);
 // Store Data In Database
 
 $bgcolor=$_POST['bgcolor'];
 $userdesc=$_POST['userdesc'];
 $topic=$_POST['topic'];
 //echo $bgcolor.$userdesc.$topic; 
// echo $main_url;
  $score=0;
 $num=0;
 //$query='insert into master values("'.$main_url.'","'.$bgcolor.'","'.$description.'","'.'0,"'.$title.'","'.$userdesc.'","'.$topic.'")';
//echo 'yha tk';
   $combineddata = mysql_real_escape_string(htmlspecialchars($combineddata));
 //echo $combineddata;


 mysql_query("insert into master values('$main_url','$bgcolor','$combineddata','$score','$description','$title','$userdesc','$topic')")or die(mysql_error());//score
 //$size=sizeof($all_links);
 //echo $size;
 //print_r($all_links);

 //mysql_query("insert into webpage_details values('$main_url','$title','$combineddata','$all_links')");

 $combineddata = mysql_real_escape_string(htmlspecialchars($combineddata));
$combineddata=metaphone($combineddata);
echo $title;
$title=metaphone($title);
echo $title;
$topic=metaphone($topic);
$userdesc=metaphone($userdesc);
$description=metaphone($description);
//echo $combineddata;
mysql_query("insert into websites.metaphonicdata values('$main_url','$bgcolor','$combineddata','$score','$description','$title','$userdesc','$topic')")or die(mysql_error());



$size=sizeof($sec_urlimg);
//echo $size;
//print_r($sec_urlimg);

for( $i=0;$i<$size;$i++){

	mysql_query("insert into websites.images values('$main_url','$sec_urlimg[$i]','$sec_urlalt[$i]')")or die(mysql_error())


;}
$size=sizeof($sec_url);
for($i=0;$i<$size;$i++){
	mysql_query("insert into links values('$main_url','$sec_url[$i]','$sec_url2[$i]')");
}
$command="rm websites.sql";
system($command);
 $command="mysqldump  -u root -p websites > websites.sql";
   system($command);

}
//images alt/url link linkcontent links /metaphonicdata
 echo 'sucessfully updated';
 
}
else{
	echo 'invalid access';
}


 //XQprint_r($all_links);

 // Gets Webpage Internal Links
 




?> 
<br/><br/><br/>
<a href="tabs.php">CLICK HERE TO GO BACK TO PREVIOUS PAGE</a>
</div>
</body>
</html>