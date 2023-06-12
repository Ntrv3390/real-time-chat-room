<?php
include('connection.inc.php'); 
$receiverId = mysqli_real_escape_string($con,$_POST['yourid']);
$myid = $_SESSION['USER_ID'];

$res_next = mysqli_query($con, "select * from chats where current_user_id='$receiverId' and your_id = '$myid' order by time desc limit 1");
if(mysqli_num_rows($res_next)>0){
$row_next=mysqli_fetch_assoc($res_next);
$res_username = mysqli_query($con, "select * from user_data where id = '$receiverId'");

$row_username = mysqli_fetch_assoc($res_username);
$iv = hex2bin($row_next['iv']);
$message = decrypt($row_next['message'], $iv);
$html='<li class="messages-you" clearfix"><span class="message-img"><img src="image/robot.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">'.$row_username['username'].'</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'.$row_next['time'].'</span></small> </div><p class="messages-p">'.$message.'</p></div></li>'; 
echo $html;
}
?>