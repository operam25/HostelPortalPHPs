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

	class response{
		public $status = "";
		public $msg = "";
	}

	$admissionnumber = $_POST["admissionnumber"];

	$sql = "SELECT * FROM user_image WHERE admissionnumber = '$admissionnumber' ";

	$result= mysqli_query($con,$sql);

	$res = new response();

	if(mysqli_num_rows($result) == 1){

		$res->status = "success";

		$row = mysqli_fetch_array($result);

		$res->msg=$row['photourl'];
		
		echo json_encode($res);

	}else{

		echo "string";
	}
}

?>