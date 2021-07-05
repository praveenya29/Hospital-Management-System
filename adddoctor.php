<?php
  require_once 'config.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location: login.php');
  }
    $alert=false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      $name = $_POST['user'];
      $pass = $_POST['pass'];
      $dep = $_POST['dep'];
      $sql = "SELECT * from doctor where username='$name'";
      $result = mysqli_query($con, $sql);
      $num = mysqli_num_rows($result);
      if ($num >=1) {
       $showError=true;
      } else {
        $sql="INSERT INTO `doctor` (`username`, `password`, `department`) VALUES ('$name', '$pass', '$dep')";
        $sql2="INSERT INTO `user` (`username`, `password`, `type`) VALUES ('$name', '$pass', 'Doctor');";
        $result = mysqli_query($con,$sql);
        $result2 = mysqli_query($con,$sql2);
        
        if($result && $result2){

          $alert = true;
        }
        else{
          $showError=true;
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
   <style>
 

body{
   background-image:url("./css/b.jpg");
   background-repeat:no-repeat;
   background-size:cover;
 }

   </style>
 
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hospital Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./Admin.php">Home</a>
      </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./adddoctor.php">Add Doctor</a>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./addReceptionist.php">Add Receptionist</a>
    </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./dispdoctor.php">Display Doctor/ Receptionist</a>
    </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./logout.php">Logout</a>
    </div>
</nav>
<?php
    if($alert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Doctor has been added!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
  if($showError){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> Doctor already exists!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
   
  }
?>
<form class="container md-4" action="adddoctor.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Username</label>
        <input type="text" class="form-control" name="user" id="inputEmail4" placeholder="Username"> <br>
      </div> 
      
        <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input name="pass" type="password" class="form-control" id="inputPassword4" placeholder="Password">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Department</label>
        <input name="dep" type="text" class="form-control" id="inputPassword4" placeholder="Department">
      </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Add doctor</button>
  </form>
</body>
</html>