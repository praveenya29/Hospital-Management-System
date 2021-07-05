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
    <title>Edit patient</title>
  
  </head>
<body>
<?php
require_once 'config.php';
if(isset($_GET['id'])){
  $id= $_GET['id'];
  $selectquery = "SELECT * from patient where name = '$id'";

  $query = mysqli_query($con,$selectquery);

 $result = mysqli_fetch_assoc($query);
 if($_SERVER["REQUEST_METHOD"] == "POST"){
   $name = $_POST['user'];
   $date = $_POST['date'];
   $number = $_POST['number'];
   $blood = $_POST['blood'];
   $gender = $_POST['gender'];
   $diagnosis = $_POST['diagnosis'];
 }}
if(isset($_POST['update'])){
  $id = $_POST['user'];

  $query = "UPDATE `patient` SET `name`='$_POST[user]',`birth`='$_POST[date]',`number`='$_POST[number]',`blood`='$_POST[blood]',`gender`='$_POST[gender]',`diagnosis`='$_POST[diagnosis]' WHERE name = '$_POST[user]'";
  $result = mysqli_query($con,$query);
  header("location:patient3.php");
}
?>
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
<form class="container  " action="update.php" method="POST">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Name</label>
        <input type="text" value="<?php echo $result['name']; ?>" class="form-control"  name="user" id="inputEmail4" placeholder="Name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Date of birth</label>
        <input type="date" value="<?php echo $result['birth']; ?>" class="form-control" name="date" id="inputEmail4" placeholder="D.O.B">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Phone number</label>
        <input type="text" value="<?php echo $result['number'];?>" class="form-control" name="number" id="inputEmail4" placeholder="Enter your mobile number">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Blood group</label>
        <input type="text" value="<?php echo $result['blood']; ?>" class="form-control" name="blood" id="inputEmail4" placeholder="Blood group">
      </div>
      <div class="form-group col-md-6">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value = 'female'>
      </div>
      </div>
      
      <div class="form-group col-md-6">
        <label for="inputEmail4">Diagnosis</label>
        <input type="text"  class="form-control" name="diagnosis" id="inputEmail4" placeholder="Diagnosis" value="<?php echo $result['diagnosis']; ?>">
      </div>
      <div class="col-12 form-group col-md-6">
    <button type="submit" name="update" class="btn btn-primary">Update patient</button>
  </div>
</body>
</html>