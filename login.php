<?php
require('connection.inc.php');
include('top.inc.php');
$msg = '';
if(isset($_SESSION['USER_LOGIN']))
{
    header('location:index.php');
    die();
}
if(isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $query = "select * from user_data where username='$username' and password = '$password'";
    $res = mysqli_query($con, $query);
    $count = mysqli_num_rows($res);
    if($count>0)
    {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['USER_LOGIN'] = true;
        $_SESSION['USER_ID'] = $row['id'];
        header('location:index.php');
    }
    else
    {
        $msg = "No account found";
        header('location:register.php');
    }
    
}
?>


<body>
    <div class="container mt-5" >
        
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <p class="mt-2"> Don't have an account? <a href="register.php">Register here</a></p>
  <p style="color:red;" class="mt-3"><?php echo $msg; ?></p>
</form>

</div>
</body>

</html>