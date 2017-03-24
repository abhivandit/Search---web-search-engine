<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body><title>CONTACT</title>
<style>body{background-color: orange;}</style></head>
<body>
<div style="text-align: center;margin-top: 6%;">
<a href="search.php">HOME</a>&nbsp
<?php if($_SESSION['authuser']==1){ ?>

<a href="logout.php">LOG OUT</a>&nbsp
<a href="tabs.php">MAIN AREA</a>
<?php } else{ ?>
<a href="login.php">LOG IN</a>&nbsp

<?php }?>
<br/><br>
<h2>CONTACT US</h2>
<br/><br/>
<div style="color:blue">
<form action="mailto:emailid.com" method="post" enctype="text/plain">
Name:<br>
<input type="text" name="name"><br>
E-mail:<br>
<input type="text" name="mail"><br>
Comment:<br>
<input type="text" name="comment" size="50" style="height:35%"><br><br>
<input type="submit" value="Send" style="color:blue">
<input type="reset" value="Reset" style="color:blue">
</form>
</div>
</body>
</html>
