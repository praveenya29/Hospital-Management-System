<?php
$con = mysqli_connect('localhost', 'root', '', 'hospital');
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['user'];
  $pass = $_POST['pass'];
  $type = $_POST['type'];
  $sql = "SELECT * from user where username='$name' AND password='$pass' AND type='$type'";
  $result = mysqli_query($con, $sql);
  $num = mysqli_num_rows($result);
  if ($num >= 1) {
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $name;
    if ($type == 'Admin') {
      header("location: Admin.php");
    } elseif ($type == 'Doctor') {
      header("location: doctor.php");}
       else {
      header("location: Receptionist.php");
    }
  }
   else {
    $showError = "Invalid credentials";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <style>
    body {
    
    
      background-repeat: no-repeat;
      background-size: cover;
    }
    .container{
   height: 350px;
    margin-top:0px;
  
   
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
            0 10px 10px rgba(0,0,0,0.22);
  }
  label{
    font-size: 20px;
 
    color: black;
  
}
.box
{
 
width: 400px;
margin-left: 800px;
background-color: #08789e;

padding-top:50px;

}

 
  
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./home.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <a class="navbar-brand" href="./login.php">Login</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      
 
  </nav>
 <div class="x">
 <img style="float:left" src="./css/logo1.jpg" width="50%" height="530px" >

  <?php
  if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your are logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  if ($showError) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Invalid credentials
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  ?>
  <div class="box"> 
    <form class="container md-1 " action="login.php" method="POST">
     
          <label for="inputEmail4">Username</label>
          <input type="text" class="form-control" name="user" id="inputEmail4" placeholder="Username">
       
          <label for="inputPassword4">Password</label>
          <input name="pass" type="password" class="form-control" id="inputPassword4" placeholder="Password">
       
        <label for="inputState">Type</label>
        <select name="type" id="inputState" class="form-control">
          <option value="Admin">Admin</option>
          <option value="Doctor">Doctor</option>
          <option value="Receptionist">Receptionist</option>
        </select>
      
      <div  class=" my-4">
     <center> <button type="submit" id="button" class="btn btn-primary ">Sign in</button> </center>
      </div>
    </form>
    </div>
    
    </div>
</body>

</html>