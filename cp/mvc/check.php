<?php
include("../configs/config.php");


$user_mail			= trim($_POST["email"]); 
$user_password  	= trim($_POST["password"]); 
$user_password_db 	= md5($user_password);


$query = "SELECT * FROM `doctor_user` WHERE `status`=1 AND `user_mail`='$user_mail' AND user_password='$user_password_db'";
$qa = mysqli_query($con,$query);
$ra = mysqli_fetch_assoc($qa);
$user_id = $ra["user_id"];


session_start();
$_SESSION['sess_user_id'] = $user_id;
header("location: ../");

?>