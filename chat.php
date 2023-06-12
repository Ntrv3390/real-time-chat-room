<?php
require('connection.inc.php');
include('top.inc.php');
$msg='';
$current_user_id = $_SESSION['USER_ID'];
$res_get_names = mysqli_query($con, "select * from user_data where id = '$current_user_id'");
$row_get_names = mysqli_fetch_assoc($res_get_names);
if(!isset($_GET['id']))
{
    $msg = "Click on a username to start chat.";
}
if(isset($_GET['id']))
{
	$getId = mysqli_real_escape_string($con,$_GET['id']);
	$res_get_name = mysqli_query($con, "select * from user_data where id='$getId'");
	$row_get_name = mysqli_fetch_assoc($res_get_name);
    $msg = "Chatting with ".$row_get_name['username'];
}
if(isset($_GET['id']) && $_GET['id'] == $current_user_id)
{
	$msg = "you cannot chat with yourself";
	sleep(7);
	header('location:chat.php');
}


if(!isset($_SESSION['USER_LOGIN']))
{
    header('location:login.php');
}
$res = mysqli_query($con,"select * from user_data where id!='$current_user_id'");
?>

<h1 style="background-color:beige;" class="text-center mt-3 mb-3">Welcome, <?php echo $row_get_names['username']; ?></h1>

<div style="display:flex;flex-direction:row;justify-content:space-between;height:100%;width:100%;border-top:0.5px solid #000;">
<div style="background-color:#343a40;height:100vh;width:30%;" class="lists">
<?php while($row=mysqli_fetch_assoc($res)){ ?>
<div style="background-color:white;height:74px;width:250px;margin-top:25px;margin-left:30px;border-radius:5px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);">
<span style="margin:20px;"><span style="font-weight:bold">Username:</span> <a style="color:#3f3f3f" href="?id=<?php echo $row['id']; ?>" ><?php echo $row['username']; ?></a></span></br>
<span style="margin:20px;"><span style="font-weight:bold">Email:</span> <a style="color:#3f3f3f" href="?id=<?php echo $row['id']; ?>" ><?php echo $row['email']; ?></a></span></br>
<span style="margin:20px;"><span style="font-weight:bold">Designation:</span> <?php echo $row['designation']; ?></span>

</div>
<?php } ?>
</div>
<div style="background-color:beige;height:100vh;width:100vw;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);border-left:0.5px solid #000;" class="chats">
    <h1 style="margin-top:240px;margin-left:30px;font-size:50px;"><?php echo $msg; ?></h1>
    <div class="container">
         <div class="row justify-content-md-center mb-4">
            <div class="col-md-6">
				<?php if(isset($_GET['id']) && $_GET['id'] != ''){ ?>
               <div class="card">
                  <div class="card-body messages-box" id="myMsg">
				  
					 <ul class="list-unstyled messages-list">
							<?php
							if(isset($_GET['id']) && $_GET['id'] != '')
							{
								$yourId = $_GET['id'];
								$current_user_id = $_SESSION['USER_ID'];
								$sql = "select chats.*, user_data.* from chats, user_data where ((chats.current_user_id = '$current_user_id' and chats.your_id = '$yourId') or (chats.current_user_id = '$yourId' and chats.your_id = '$current_user_id')) and user_data.id = '$yourId' ";
								$res_chats = mysqli_query($con, $sql);
								
								$count = mysqli_num_rows($res_chats);
								if($count>0)
								{
									$html='';
								while($row=mysqli_fetch_assoc($res_chats)){
									$iv = hex2bin($row['iv']);
									$message = decrypt($row['message'], $iv);	
									$time=$row['time'];
									$strtotime=strtotime($time);
									$stime=date('h:i A',$strtotime);
									$type=$row['current_user_id'];
									if($type != $_SESSION['USER_ID']){
										$class="messages-you";
										$imgAvatar="robot.png";
										$name=$row['username'];
									}else{
										$class="messages-me";
										$imgAvatar="user_avatar.png";
										$name="Me";
									}
									$html.='<li class="'.$class.' clearfix"><span class="message-img"><img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">'.$name.'</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'.$stime.'</span></small> </div><p class="messages-p">'.$message.'</p></div></li>';
								}
								echo $html;
								}
								else {
								// 	$html='<li class="messages-you clearfix"><span class="message-img"><img width="20%" src="image/robot.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">ChatBot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> </small></br> </div><p class="messages-p">Hi there, what can I do for you?</p></div></li>';
								// echo $html;
								}
							}
							
							?>
                    
                     </ul>
                  </div>
                  <div class="card-header">
                    <div class="input-group">
					   <input id="input-me" type="text" onkeydown="handleKeyDown(event)" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
					   <span class="input-group-append">
					   <input type="button" class="btn btn-primary" value="Send" onclick="send_message()">
					   </span>
					</div> 
                  </div>
               </div>
			   <?php }?>
            </div>
         </div>
      </div>
</div>
</div>
<script>
function loadMessages() {
  var yourid = <?php echo $_GET['id']; ?>;
  $.ajax({
    url: 'get_next_message.php',
    method: 'POST',
    data:yourid='+yourid',
    success: function(data) {
      $('.messages-list').append(data);
    }
  });
}

setInterval(loadMessages, 3000);
loadMessages();
</script>
</body>
</html>