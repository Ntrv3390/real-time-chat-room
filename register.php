<?php
require('connection.inc.php');
include('top.inc.php');
$msg='';
if(isset($_POST['submit']))
{
    $college_name = mysqli_real_escape_string($con,$_POST['college_name']);
    $designation = mysqli_real_escape_string($con,$_POST['designation']);
    if($designation == '0')
    {
      $msg = "Please select a valid designation and try again";
    }else{
    $mobile_number = mysqli_real_escape_string($con,$_POST['mobile_number']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $username_res = mysqli_query($con,"select * from user_data where username='$username'");
    if(mysqli_num_rows($username_res)>0)
    {
        $msg = 'Username already exists. Please enter a new one or login.';
    }
    else{
        $query = "insert into user_data(college_name,designation,mobile_number,email,username,password) values('$college_name','$designation','$mobile_number','$email','$username','$password')";
        $res = mysqli_query($con, $query);
        header('location:login.php');
    }
  }
}
?>

<body>
    <div class="container mt-3" >
        
<form method="post">
<div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">College Name</label>
    <input type="text" class="form-control" name="college_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter College Name">

  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Designation</label>
  <select class="form-control" name="designation" aria-label="Default select example">
  <option value="0" selected>Select Designation</option>
  <option value="HOD">HOD</option>
  <option value="Professor">Professor</option>
  <option value="Admin">Admin</option>
  <option value="Student">Student</option>
</select>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="number" class="form-control" name="mobile_number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile Number">

  </div>
  
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <p class="mt-2"> Already have an account? <a href="login.php">Login here</a></p>
  <p style="color:red;margin-top:-10px;"><?php echo $msg; ?></p>
</form>

</div>
</body>

</html>