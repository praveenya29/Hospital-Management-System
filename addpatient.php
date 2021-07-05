<?php
  require_once 'config.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location: login.php');
  }
    $alert = false;
    $showError=false;
    if(isset($_POST['btn'])){
      $name = $_POST['user'];
      $date = $_POST['date'];
      $number = $_POST['number'];
      $blood = $_POST['blood'];
      $gender = $_POST['gender'];
      $diagnosis = $_POST['diagnosis'];
      $sql = "SELECT * from patient where name='$name' ";
      $result = mysqli_query($con, $sql);
      $num = mysqli_num_rows($result);
      if ($num == 1) {
      
        $showError=true;
      } else {
        $sql= "INSERT INTO `patient` (`name`, `birth`, `number`, `blood`, `gender`, `diagnosis`) VALUES ('$name', '$date', '$number', '$blood', '$gender', '$diagnosis')";
        $result = mysqli_query($con,$sql);
        if($result){
          $alert = true;
         
        }
       
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>



body{
   background-image:url("./css/b.jpg");
   background-repeat:no-repeat;
   background-size:cover;
 }

    input,label{
      margin-left: 10px;
    
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add patient</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hospital Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./Receptionist.php">Home</a>
      </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./addpatient.php">Add Patient</a>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./search2.php">Search patient</a>
    </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./patient3.php">Edit patient</a>
    </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./logout.php">Logout</a>
    </div>
</nav>
<?php
  if ($alert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Patient Added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  if ($showError) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Patient already exists!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  ?>
<form class="container " action="addpatient.php" method="POST">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Name</label>
        <input type="text" class="form-control" name="user" id="inputEmail4" placeholder="Name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Date of birth</label>
        <input type="date" class="form-control" name="date" id="inputEmail4" placeholder="D.O.B">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Phone number</label>
        <input type="text" class="form-control" name="number" id="inputEmail4" placeholder="Enter your mobile number">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Blood group</label>
        <input type="text" class="form-control" name="blood" id="inputEmail4" placeholder="Blood group">
      </div>
      <div class="form-group col-md-6">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value='male'>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value = 'female'>
      </div>
      </div>
      
      <div class="form-group col-md-6">
        <label for="inputEmail4">Diagnosis</label>
        <input type="text" class="form-control" name="diagnosis" id="inputEmail4" placeholder="Diagnosis">
      </div>
      <div class="col-12 form-group col-md-6">
    <button type="submit" name="btn" class="btn btn-primary">Add patient</button>
  </div>
</body>
</html>