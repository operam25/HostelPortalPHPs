<?php
 
error_reporting(0);
 
$db_name = $_POST["username"];
$mysql_user = "root";
$mysql_pass = $_POST["apikey"];
$server_name = "localhost";

$con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
 
if(!$con){
    echo '{"status":"Unable to connect to the database."}';
}else{

	class response
	{
		public $status = "";
		public $msg = array();
	}

	$admissionnumber = $_POST["admissionnumber"];
	$password = sha1($_POST["password"]);

	$query = "SELECT * FROM user_info where admissionnumber = '$admissionnumber' AND password = '$password'";

	$result = mysqli_query($con,$query);

	$res = new response();

	if(mysqli_num_rows($result) == 1){

		$res->status = "success";
		$row = mysqli_fetch_array($result);
		$res->msg = array("name" => $row[1], "email" => $row[3], "admissionnumber" => $row[0], "contactnumber" => $row[4],);
		
	}else{
		$res->status = "Admission Number or Password is incorrect.";
	}
	echo json_encode($res);

}
 
?>