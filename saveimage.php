<?php
   error_reporting(0);

$db_name = $_POST["username"];
$mysql_user = "root";
$mysql_pass = $_POST["apikey"];
$server_name = "localhost";

 $upload_path = 'imagebase/';
 $server_ip = gethostbyname(gethostname());
 $upload_url = 'http://'.$server_ip.'/HostelPortal/'.$upload_path;
 $response = array(); 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 if(isset($_POST['name']) and isset($_FILES['image']['name'])){
 $con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
 $name = $_POST['name'];
 $fileinfo = pathinfo($_FILES['image']['name']);
 $extension = $fileinfo['extension'];
 $file_url = $upload_url . $name . '.' . $extension;
 $file_path = $upload_path . $name . '.'. $extension; 
 
 try{
 move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
 $sql = "INSERT INTO `user_image` (`admissionnumber`, `photourl`) VALUES ('$name','$name');";
 
 if(mysqli_query($con,$sql)){
  
 $response['error'] = false; 
 $response['photourl'] = $file_url; 
 }

 }catch(Exception $e){
 $response['error']=true;
 $response['message']=$e->getMessage();
 } 

 echo json_encode($response);

 mysqli_close($con);
 }else{
 $response['error']=true;
 $response['message']='Please choose a file';
 }
 }
 

 ?>