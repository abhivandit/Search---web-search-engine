
<html>
<head><title>SEARCH RESULTS</title><style>
body {background-color: white;}</style>
</head>
<body>
<br/>
<div >
<form action="searchresult.php?count=0&count1=0&count2=0&count3=0&count4=0&count5=0" method="post">
<input type="text" name="name" style="text-align: center;width: 50%;margin-right: 5%"/>

<input type="submit" name="submit" value="Search" style="margin-left:auto;margin-right: auto;width: 8%;" />
</form>
</div>
<?php

$name=$_POST['name'];
if($name==""){
	$name=$_GET['name1'];
	if($name==""){
		echo "no results found";
		exit ();
	}
}
echo $name;
$name2=metaphone($name);
$count=$_GET['count'];
$count1=$_GET['count1'];
$count2=$_GET['count2'];
$count3=$_GET['count3'];
$count4=$_GET['count4'];$count5=$_GET['count5'];

?>

<br/><br/>
<div style="margin-left: 80%">
<?php
echo '<a href="imagessearch.php?name='.$name.'">Images</a>'; ?>
<br/><br/><br/><br/><br/>
</div>
<div style="text-align:center">

<?php
$keywords=explode(" ",$name);

 $host="localhost";
 $username="root";
 $password="abhi123";
 $databasename="websites";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename) or die('error');
  $name = htmlspecialchars($name);
  //changes to the html equivalent
      $name = mysql_real_escape_string($name);
      $query="SELECT master.url ,master.userdesc from websites.master where MATCH(metadata,title,url,userdesc,topic,bgcolor,description) AGAINST ('$name' in NATURAL LANGUAGE MODE WITH QUERY EXPANSION) LIMIT "." 10 "."OFFSET $count";
 $result=mysql_query($query) or die(mysql_error());
 $num_row=mysql_num_rows($result);
      $num_row=0;
 if ($num_row==0){
 	echo 'inside';

 	      $query="SELECT master.url ,master.userdesc from websites.master where MATCH(metadata,title,url,userdesc,topic,bgcolor,description) AGAINST ('$name' in BOOLEAN MODE) LIMIT"." 10 "."OFFSET $count1
";
$result=mysql_query($query) or die(mysql_error());
 $num_row=mysql_num_rows($result);
 if ($num_row==(0)){
 	echo 'inside2';
 	$query= "SELECT url ,userdesc from websites.master where Concat( metadata,title,url,userdesc,topic,bgcolor,description) LIKE '%".$name."%' LIMIT 10 OFFSET $count2";//added
 	 $result=mysql_query($query) or die("error");
 	 $num_row=mysql_num_rows($result);
 	 if($num_row==0){
 	 	$query="SELECT master.url,userdesc from websites.master,links where master.url=links.url AND MATCH(linkcontent) AGAINST ('$name' in BOOLEAN MODE) LIMIT"." 10 "."OFFSET $count4";
 	 	 $result=mysql_query($query) or die("error");
 	 $num_row=mysql_num_rows($result);
 	 if($num_row==0){
 	 	$query="SELECT  links.links from websites.links where MATCH(linkcontent) AGAINST ('$name' in BOOLEAN MODE) LIMIT"." 10 "."OFFSET $count5";
 	 	 	 $result=mysql_query($query) or die("error");
 	 $num_row=mysql_num_rows($result);
 	 if($num_row==0){
 	 	echo 'inside3';
 	 	echo $name;
 	 	$name1=metaphone($name);
 	 	echo $name1;
 	 	echo metaphone('website');

 
 	 	$query="SELECT master.url,master.userdesc from websites.master,metaphonicdata where metaphonicdata.url=master.url AND  Concat( metaphonicdata.metadata,metaphonicdata.title,metaphonicdata.url,metaphonicdata.userdesc,metaphonicdata.topic,metaphonicdata.bgcolor,metaphonicdata.description) LIKE '%".$name1."%' LIMIT 10 OFFSET $count3";
 	 		 $result=mysql_query($query) or die("error");
 	 $num_row=mysql_num_rows($result);
 	 if($num_row!=0){
 	 	$count3=$count3+10;

 	 }
 	 }
 	 else{
 	 	$count5=$count5+10;
 	 }

 	 }
 	 	else{
 	 		$count4=$count4+10;
 	 	}

 	 }
 	 else{
 	 	$count2=$count2+10;
 	 }
 	
 	}
 	else{
 		$count1=$count1+10;
 	}

 }
 else{
 	$count=$count+10;
 }

if($num_row==0){
	echo 'Sorry, no results found';}
 while($row=mysql_fetch_assoc($result)){

$num=0;
 	foreach ($row as $value){
 		if($num==0){
 			?>
 			<a href="<?php echo $value ?>"><?php echo $value?></a><br/><?php
 		$num++;}
 		else{ 			echo $value.'<br/>';
 		}
 	}
 }
if($num_row!=0){
	?></div><div style="position: absolute;bottom: 10%;text-align: left;margin-left: 5%"><a href="searchresult.php?count=<?php $count=$count+10; echo $count; ?>&name1=<?php $name1=$name; echo   $name1; ?>&count1=<?php echo $count1;?>&count2=<?php echo $count2;?>&count3=<?php echo $count3;?>&count4=<?php echo $count4;?>&count5=<?php echo $count5;?>">NEXT-></a><br/><?php
}
      //to prevent sql injection
//echo 'yha tak';



 ?>


 </div>
 </body>
 </html>
 
