
<html>
<head>
<title>WELCOME</title>
</head>
<body>
<div style="text-align:center">

<?php
//setcookie('username',"abhivandit",time()+60*60);//setting vcokie

session_start();
if(isset($_POST['submit'])){
  $_SESSION['username']=$_POST['user'];

$_SESSION['password']=$_POST['pass'];
$_SESSION['role']=$_POST['role'];
echo $_SESSION['role']; 
$_SESSION['authuser']=0;
if(($_POST['user']=="")||($_POST['pass']=="")||($_POST['role']=="")){
    echo '<br/><br/><br/><br/><br/><br/>';
  echo '<a href=login.php style="text-align:center;margin-left:40%">'.'fill all the details'.'</a>';
  exit();
  



}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>WELCOME <?php echo $_SESSION['role']; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><style>
body {background-color: powderblue;}</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container" style="text-align: center">
<?php
$host='127.0.0.1';
$user='root';
$pass='abhi123';
//echo 'befoire user';
$db=mysql_connect('127.0.0.1' , 'root' ,'abhi123') or die("error") ;
if($db){
  //echo 'success';
}
//echo "connected";
mysql_select_db('websites',$db) or die("server down");
//echo 'sucess2';
if($_SESSION['role']=='admin'){
  //echo 'success3';
  $query='SELECT username  from admin where username="'.$_SESSION['username'].'"and password="'.$_SESSION['password'].'"';
  $result=mysql_query($query,$db) or die("server down");
  //echo 'sucess4';
  $numrows=mysql_num_rows($result);
  if($numrows==0){
    
    echo '<a href=login.php style="text-align:center;margin-left:60%">'.'Try Again'.'</a>';
    echo '<br/><br/><br/><br/><br/>'.'wrong credentials';
    exit();
  }
  else{
    //echo 'sucess5';
      $_SESSION['authuser']=1;
  }
}
else if($_SESSION['role']=='guest'){
  $query='SELECT username from guest where username="'.$_SESSION['username'].'"and password="'.$_SESSION['password'].'"';
  $result=mysql_query($query,$db) or die("server down");
  $numrows=mysql_num_rows($result);
  if($numrows==0){
    
    echo '<a href=login.php style="text-align:center;margin-left:40%">'.'Try Again'.'</a>';
    echo '<br/><br/><br/><br/><br/>'.'wrong credentials';
    exit();
  }
  else{
      $_SESSION['authuser']=1;
  }

}


?>

<div style="text-align: center;font-size: 250%">
<?php
echo 'Hello '.$_SESSION['username'].'!';
?>
</div>
<div style="margin-left: 75%;font-size: 110%">
 <a href="search.php">HOME   </a>
<div style="margin-left: 2%;font-size: 110%">
<a href="logout.php"> LOG OUT</a>
</div>
 </div>
 
<?php 
if($_SESSION['role']=='admin'){ ?>



  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">UPDATE OR MODIFY</a></li>
    <li><a data-toggle="tab" href="#menu1">DELETION</a></li>
    <li><a data-toggle="tab" href="#menu2">BULK LOADING</a></li>
    <li><a data-toggle="tab" href="#menu3">REMOVE ACCOUNT</a></li>
    <li><a data-toggle="tab"  href="#menu4">ADD ACCOUNT</a></li>
    <li><a data-toggle="tab"   href="#menu5">DOWNLOADS and RESTORE</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <div style="margin-top: 5%">
    <div style="text-align: center;font-size:110%;color: seagreen">

TO UPDATE<br/></div><br/><br/>

   <form action="crawler.php?count=0" method="post">
<p style="color:red">*
<input type="text" name="url" placeholder="url"/>
</p><p style="color:red">*
<input type="text"  name="bgcolor" placeholder="backgroundcolour"/></p><p style="color:red">*
<select name="topic" >
<option  value="SCI-FI">SCI-FI</option>
<option value="EDUCATIONAL">EDUCATIONAL</option>
<option value="ENTERTAINMENT">ENTERTAINMENT</option>
<option value="COMPANY">COMPANY</option>
</select>
</p>
<p>
<input type=text style="width:70%;height: 10%" placeholder="userdescription" name="userdesc"></textarea>
</p>
<p>
<input type="submit" value="submit" name="submit" style="color:orange"/>
</p>
</form>
</div>
<br/><br/>

<div style="text-align: center;font-size:110%;color: seagreen">
OR<br/>
TO MODIFY<br/></div><br/><br/>
<div style="margin-top: : 5%">
<form action="crawler.php?count=2" method="post">

<p style="color:red">*
<input type="text" name="url" placeholder="previousurl"/>
</p>
<p style="color:red">*
<input type="text" name="curl" placeholder="modifiedurl"/></p>
<p style="color:red">*
<input type="text"  name="bgcolor" placeholder="backgroundcolour"/></p><p style="color:red">*
<input type="text"  name="topic" placeholder="topic"/>
</p>
<p>
<input type=text style="width:70%;height: 10%" placeholder="userdescription" name="userdesc"></textarea>
</p>
<p>
<input type="submit" value="submit" name="submit" style="color:blue"/>
</p>
</form>
</div>

<div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH * ARE COMPULSORY*</div>


    </div>
    <div id="menu1" class="tab-pane fade">

<div style="text-align: center;font-size: 90%;color:seagreen;margin-top: 5%">
*SUBMIT THE URL OF YOUR WEBSITE TO STOP IT FROM SHOWING IN THE SEARCH RESULTS*<br/><br/><br/><br/>
</div>
    <div style="text-align: center">
<form action="delete.php" method="post">

<p style="color:red">*
<input type="text" name="url" placeholder="url" style="width:50%" />
</p><p>

<p>
<input type="submit" value="submit" name="submit" style="color:violet"/>
</p>
</form>

</div>
<div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH * ARE COMPULSORY*</div>
    </div>
    <div id="menu2" class="tab-pane fade">
    <div style="text-align: center;font-size: 90%;color:seagreen;margin-top: 5%">
*UPLOAD THE FILE IN CSV FORMAT ONLY*<br/> Download the sample file given below to know the correct format<br/><br/><br/><br/>
</div>

     <div style="text-align: center">

<form enctype="multipart/form-data" action="crawler.php?count=1" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
   <input name="userfile" type="file" style="text-align: center;margin-right: 15%;margin-left: 35%" accept=".csv" />
   <br/>
    <input type="submit" name="submit" value="Send File" style="color:green"/>
</form>

</div>
<div style="margin-left: 0%;margin-top: 10%">
<a href="sample.csv">Download</a>
    </div>
    <div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH * ARE COMPULSORY*</div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <div style="text-align: center;font-size: 120%;color:seagreen;margin-top: 8%">
<a href="remove.php?username2=<?php echo $_SESSION['username']; ?>" style="color:powderblue">REMOVE YOUR ACCOUNT</a><br/><br/>
</div>
      <div style="text-align: center;font-size: 120%;color:seagreen;margin-top: 5%">
          OR<br/><br/>
      MENTION THE USERNAME OF THE ACCOUNT YOU WISH TO REMOVE<br/><br/></div>
     <div style="text-align: center">

<form action="remove.php?username2=" method="post">

<p style="color:red">*
<input type="text" name="username1" placeholder="username" style="width:50%" />
</p><p>

<p>
<input type="submit" value="submit" name="submit" style="color:orange"/>
</p>
</form>
</div>
<div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH * ARE COMPULSORY*</div>
    </div>
    <div id="menu4" class="tab-pane fade">

      <div style="text-align: center;font-size: 120%;color:seagreen;margin-top: 5%">
      MENTION THE REQUIRED DETAILS OF THE USER TO BE ADDED<br/><br/></div>
    <div style="text-align: center; margin-top:5%">
  <form  action="addaccount.php" method="post" >
    <p style="color:red"> *
      <input type="text" name="user" placeholder="username" style="width:25%" />
    </p>
    <p style="color:red"> *
      <input type="password" name ="pass" placeholder="password" style="width: 25%" />
    </p>
    <br/>
   <p style="color:orange;font-style: ARIAL">
    <input type="radio" name="role1" value="admin">ADMIN
    </p>
    <p style="color:violet;font-style: ARIAL">
    <input type="radio" name="role1" value="guest">GUEST
    </p>
    <br/>
    <p>
    <input type="submit" name="submit" value="ADD" style="color:powderblue;width:10%"/>
    </p>
    </form>
    </div>
    <div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH  *  ARE COMPULSORY*</div>
    </div>
        <div id="menu5" class="tab-pane fade">

      <div style="text-align: center;font-size: 120%;color:seagreen;margin-top: 15%">
      <a href="SOURCE.tar.gz" style=" color:seagreen">SOURCE CODE(.tar)</a>
      <br><br/>
      <a href="websites.sql" style="color:seagreen">DATABASE BACKUP(.sql)</a>
      <br/><br/>
      <a href="restore.php" style="color:seagreen">DATABASE RESTORE</a>
      <br/>
      </div>
        </div>

  </div>
  </p>
  </form>
  </div>
  </div>
  </p>
  </form>
  </div>
  </div>
<?php
}else if($_SESSION['role']=='guest'){?>


  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">MODIFY</a></li>
    <li><a data-toggle="tab" href="#menu1">DELETION</a></li>
   <li><a data-toggle="tab" href="#menu2">REMOVE ACCOUNT</a></li>
  
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <div style="margin-top: 3%">
    
</div>


<div style="text-align: center;font-size:110%;color: seagreen">

TO MODIFY<br/><br/>
</div><div style="text-align: center;font-size:90%;color: seagreen">
*Mention all the required modified details*
<br/><br/></div>
<div style="margin-top: : 5%">
<form action="crawler.php?count=2" method="post">

<p style="color:red">*
<input type="hidden" name="url" value="<?php echo $_SESSION['username']; ?>"/>
</p>
<p style="color:red">*
<input type="text" name="curl" placeholder="modifiedurl"/></p>
<p style="color:red">*
<input type="text"  name="bgcolor" placeholder="backgroundcolour"/></p><p style="color:red">*
<input type="text"  name="topic" placeholder="topic"/>
</p>
<p>
<input type=text style="width:70%;height: 10%" placeholder="userdescription" name="userdesc"></textarea>
</p>
<p>
<input type="submit" value="submit" name="submit" style="color:blue"/>
</p>
</form>
</div>

<div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH * ARE COMPULSORY*</div>


    </div>
    <div id="menu1" class="tab-pane fade">

<div style="text-align: center;font-size: 90%;color:seagreen;margin-top: 5%">
*STOP YOUR WEBSITE FROM SHOWING UP IN THE SEARCH RESULTS*<br/><br/><br/><br/>
</div>
    <div style="text-align: center">
<form action="delete.php" method="post">

<p style="color:red">*
<input type="hidden" name="url" value="<?php echo $_SESSION['username']; ?>" style="width:50%" />
</p><p>

<p>
<input type="submit" value="YES, I DON'T WANT MY WEBSITE TO BE SHOWN IN THE SEARCH RESULTS" name="submit" style="color:violet"/>
</p>
</form>

</div>
<div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH * ARE COMPULSORY*</div>
    </div>
   
    <div id="menu2" class="tab-pane fade">
     
      <div style="text-align: center;font-size: 120%;color:seagreen;margin-top: 5%">
         
     Do You Really Wish To Remove Your Account?<br/><br/></div>
     <div style="text-align: center">

<form action="remove.php?username2=" method="post">

<p style="color:red">*
<input type="hidden" name="username1" value="<?php echo $_SESSION['username']; ?>" style="width:50%" />
</p><p>

<p>
<input type="submit" value="YES" name="submit" style="color:orange"/>
</p>
</form>
</div>
<div style="margin-top: 5%;margin-bottom: 3%;color:red;font-size: 90%%;text-align: center">
*FIELDS MARKED WITH * ARE COMPULSORY*</div>
    </div>
    
    
        

  </div>
  </p>
  </form>
  </div>
  </div>
  </p>
  </form>
  </div>
  </div>








<?php

}?>

</div>
<a href="contact.php" style="color:green;margin-left:75%">CONTACT US</a>
<?php
include 'include.php';
?>
</div>
</body>
</html>
