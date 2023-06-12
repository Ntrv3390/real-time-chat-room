<?php
date_default_timezone_set('Asia/Kolkata');
include('connection.inc.php');
$iv = openssl_random_pseudo_bytes(16);
$message=mysqli_real_escape_string($con,$_POST['message']);
$message =  encrypt($message, $iv);
$iv = bin2hex($iv);
$myid = $_SESSION['USER_ID'];
$yourid = mysqli_real_escape_string($con,$_POST['yourid']);
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into chats(current_user_id,your_id,message,time) values('$myid','$yourid','$message','$iv','$added_on')");
?>