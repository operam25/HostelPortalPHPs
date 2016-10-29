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
	}

	$name = $_POST["name"];
	$email = $_POST["email"];
	$contactnumber = $_POST["contactnumber"];
	$admissionnumber = $_POST["admissionnumber"];
	$password = sha1($_POST["password"]);

	$qury = "SELECT * FROM user_info where admissionnumber = '$admissionnumber'";

	$reslt = mysqli_query($con,$qury);

	if(mysqli_num_rows($reslt) >= 1){

		$res->status = "User is already registered";

	}else{
		
		$query = $query = "INSERT INTO `user_info` (`name`, `email`, `admissionnumber`, `contactnumber`, `password`) VALUES('$name','$email','$admissionnumber','$contactnumber','$password')";

		$result = mysqli_query($con,$query);

		$res = new response();

		if($result){
			$res->status = "success";
		}else{
			$res->status = "Unable to save the data.";
		}
	}
	echo json_encode($res);

}
 
?>