<?php
 
error_reporting(0);
 
$db_name = $_POST["username"];
$mysql_user = "id120756_hostelportal";
$mysql_pass = $_POST["apikey"];
$server_name = "localhost";

// $db_name = "HostelPortal";
// $mysql_user = "root";
// $mysql_pass = "gta114tarun";
// $server_name = "localhost";

$con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
 
if(!$con){

    echo '{"status":"Unable to connect to the database."}';

}else{

	class response
	{
		public $status = "";
		public $count = 0;
		public $msg = array() ;
	}

	$page = $_POST["page"];

	$admissionnumber = $_POST["admissionnumber"];
	$admissionnumber1 = sha1($_POST["admissionnumber"]);

	$query = "SELECT count(*) FROM register_complain WHERE user = '$admissionnumber' OR user = '$admissionnumber1'";

	$result = mysqli_query($con,$query);

	$row = mysqli_fetch_array($result);

	$res = new response();
	$res->count = $row[0];

	$query = "SELECT * FROM register_complain WHERE user = '$admissionnumber' OR user = '$admissionnumber1' ORDER BY time DESC LIMIT $page,10";

	$result = mysqli_query($con,$query);

	while($row = mysqli_fetch_assoc($result)){

		if($res->status == ""){
			$res->status = "success";
		}

		$res->msg[] = array("complainId" => $row['complainid'], "user" => $row['user'], "header" => $row['header'], "details" => $row['details'],"time" => $row['time']);
		
	}

	echo json_encode($res);

}
 
?>