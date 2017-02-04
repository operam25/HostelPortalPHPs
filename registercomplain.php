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
		public $complainid = "";
	}

	$isanonymous = $_POST["isanonymous"];
	$header = $_POST["header"];
	$details = $_POST["details"];


	if($isanonymous == "true")
		$admissionnumber = sha1($_POST["admissionnumber"]);
	else
		$admissionnumber = $_POST["admissionnumber"];

	$query = "SELECT max(complainid) FROM register_complain";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$res = new response();
	$complain = $row[0] + 1;

	$res->complainid = $complain;

	$query = "INSERT INTO `register_complain` (`complainid`, `user`, `header`, `details`) VALUES('$complain','$admissionnumber','$header','$details')";

	$result = mysqli_query($con,$query);

	if($result){
		$res->status = "success";
	}else{
		$res->status = "Unable to save the data.";
		echo(createLog(mysql_error()));
	}

	echo json_encode($res);

}
 
 ?>