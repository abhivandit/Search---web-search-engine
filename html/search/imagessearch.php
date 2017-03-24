<html>
<head><title>IMAGE SEARCH RESULTS</title><style>
body {background-color: powderblue;}</style>
</head>
<body>
<?php

$name=$_GET['name'];
?>
<div style="text-align: center ">
<?php
//$keywords=explode(" ",$name);

 $host="localhost";
 $username="root";
 $password="abhi123";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename) or die(mysql_error());
  $name = htmlspecialchars($name);
  //changes to the html equivalent
      $name = mysql_real_escape_string($name);
      echo $name;
      //to prevent sql injection
$query="SELECT master.url ,images.imagelink from master,images where master.url=images.url AND MATCH(metadata,title,master.url,userdesc,topic,bgcolor,description) AGAINST ('$name' in NATURAL LANGUAGE MODE WITH QUERY EXPANSION)
";
 $result=mysql_query($query) or die(mysql_error());
 $num_row=mysql_num_rows($result);
 if ($num_row==0){
 	echo 'inside'.$name;

 	      $query="SELECT master.url ,images.imagelink from master,images where master.url=images.url AND (MATCH(metadata,title,master.url,userdesc,topic,bgcolor,description) AGAINST ('$name' in BOOLEAN MODE))
";
$result=mysql_query($query) or die(mysql_error());
 $num_row=mysql_num_rows($result);
 if ($num_row==0){
 	echo 'inside2';
 	$query= "SELECT master.url ,images.imagelink from images,master where master.url=images.url AND Concat( metadata,title,master.url,userdesc,topic,bgcolor,description) LIKE '%".$name."%'";//added
 	 $result=mysql_query($query) or die("error");
 	$num_row=mysql_num_rows($result);
 	 if($num_row==0){
 	 	$name1=metaphone($name);
 	 	$query="SELECT images.url from websites.master,metaphonicdata,images where metaphonicdata.url=master.url AND master.url=images.url AND MATCH(metaphonicdata.metadata,metaphonicdata.title,metaphonicdata.url,metaphonicdata.userdesc,metaphonicdata.topic,metaphonicdata.bgcolor,metaphonicdata.description) AGAINST ('$name1' in BOOLEAN MODE) LIMIT"." 10";
 	 		 $result=mysql_query($query) or die("error");
 	 $num_row=mysql_num_rows($result);
 	}
 }
 }

if($num_row==0){
	echo 'Sorry, no results found';}
echo 'takdhana';
 while($row=mysql_fetch_assoc($result)){
$num=0;$currenturl;
 	foreach ($row as $value){
 		if($num==0){
 			$currenturl=$value;
 			?>
 		<?php
 		$num++;}
 		else { 
 	$flag1=0;
 	$flag2=0;
	?><img src="<?php  echo $value; ?>" width="100" height="100"><?php
 		
?><img src="<?php echo $currenturl?>/<?php  echo $value; ?>" width="100" height="100"><?php

 	}
 	}
 }
 	
 			
// Store Data In Da

 ?>
 </div>
 </body>
 </html>
 