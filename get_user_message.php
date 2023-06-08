<?php
date_default_timezone_set('Asia/Kolkata');
include('connection.inc.php');
$message=mysqli_real_escape_string($con,$_POST['message']);
$myid = $_SESSION['USER_ID'];
$yourid = mysqli_real_escape_string($con,$_POST['yourid']);
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into chats(current_user_id,your_id,message,time) values('$myid','$yourid','$message','$added_on')");
?>