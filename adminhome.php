<?php

// require 'init.php';
 
// error_reporting(0);

// $con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
 
// 	if(!$con){
// 	    header("Location:adminlogin.php?invalid=true");
// 		exit();
// 	}else{

// 		//$sessionid = "";

// 		$uniqueid = "operam25";
// 		$password = sha1("11143745");
// 		echo($password)

// 		$query = "SELECT * FROM admin_info where uniqueid = '$uniqueid' AND password = '$password'";

// 		$result = mysqli_query($con,$query);

// 		$res = new response();

// 		if(mysqli_num_rows($result) == 1){

// 			//$sessionid = $admissionnumber;
			
// 		}else{
// 			header("Location:adminlogin.php?invalid=true");
// 			exit();
// 		}
// 	}
 
?>

<html>
<head>
<meta charset="utf-8">
<title>Admin Panel Home Page</title>
<style type="text/css">
body {
background-color: #f4f4f4;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 16px;
line-height: 1.5em;
}
a { text-decoration: none; }
h1 { font-size: 1em; }
h1, p {
margin-bottom: 10px;
}
strong {
font-weight: bold;
}
.uppercase { text-transform: uppercase; }

/* ---------- LOGIN ---------- */
#login {
margin: 50px auto;
width: 300px;
}
form fieldset input[type="text"], input[type="password"] {
background-color: #e5e5e5;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 14px;
height: 50px;
outline: none;
padding: 0px 10px;
width: 280px;
-webkit-appearance:none;
}
form fieldset input[type="submit"] {
background-color: #008dde;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #f4f4f4;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 50px;
text-transform: uppercase;
width: 300px;
-webkit-appearance:none;
}
form fieldset a {
color: #5a5656;
font-size: 10px;
}
form fieldset a:hover { text-decoration: underline; }

</style>
</head>
<body>
<div id="login">
<h1><strong>Welcome</strong></h1>
<form action="showadmincomplain.php" method="POST">
<fieldset>
<p><input type="submit" value="Show Complains"></p>
</fieldset>
</form>
<form action="" method="POST">
<fieldset>
<p><input type="submit" value="Publish Notices"></p>
</fieldset>
</form>
<form action="" method="POST">
<fieldset>
<p><input type="submit" value="Show Notices"></p>
</fieldset>
</form>
</div>
</body>
</html>