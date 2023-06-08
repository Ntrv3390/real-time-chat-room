<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Chat Room by Mohammed Puthawala</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	  <script type="text/javascript">
	 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh>=12)?'PM':'AM';
			hh = hh%12;
			hh = hh?hh:12;
			hh = hh<10?'0'+hh:hh;
			min = min<10?'0'+min:min;
			var time = hh+":"+min+" "+ampm;
			return time;
		 }
		 window.onload = function() {
			jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
};

function send_message(){
			jQuery('.start_chat').hide();
			var message=jQuery('#input-me').val();
            var yourid = <?php echo $_GET['id']; ?>;
			var html='<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+message+'</p></div></li>';
			jQuery('.messages-list').append(html);
			jQuery('#input-me').val('');
			if(message){
				jQuery.ajax({
					url:'get_user_message.php',
					type:'post',
					data:'message='+message+'&yourid='+yourid,
					success: function(result){
						jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
					}
				});
			}
			
		 }
		 function receiveMessages() {
			jQuery('.messages-box').scrollTop(jQuery('messages-box')[0].scrollHeight);
    $.ajax({
        type: 'GET',
        url: 'get_next_message.php',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                var message = response.message;
                // Display the received message in the chat container
            }
            // Make the next long polling request
            receiveMessages();
        },
        error: function(xhr, status, error) {
            console.error('Error: ' + error);
            // Retry after a certain interval
            setTimeout(function() {
                receiveMessages();
            }, 5000); // 5 seconds
        }
    });
}
receiveMessages();
function handleKeyDown(event) {
    if (event.key === 'Enter') {
      event.preventDefault(); 
      send_message();
	}
  }

         </script>
   </head>
   <body>
<!---Navbar starts-->

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">ChatRoom By Mohammed Puthawala</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" style="margin-left:1100px;" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<?php if(isset($_SESSION['USER_LOGIN'])){ ?>
				<li class="nav-item active">
					<a class="nav-link" href="chat.php">Chats </a>
				</li>
				<?php } ?>
				<?php if(!isset($_SESSION['USER_LOGIN'])){ ?>
				<li class="nav-item active">
					<a class="nav-link" href="register.php">Register </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="login.php">Login </a>
				</li>
				<?php } ?>
				<?php if(isset($_SESSION['USER_LOGIN'])){ ?>
				<li class="nav-item active">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
				<?php } ?>
				</ul>
			</div>
			</nav>

<!---Navbar ends--> 