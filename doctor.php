<?php
    require_once 'config.php';
    session_start();
    if($_SESSION['loggedin'] != true || !isset($_SESSION['loggedin'])){
      header('location: login.php');
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
    <title>Doctor</title>
</head>
<style>
   
   .jumbotron {
 background-color: #08789e;

}
.container{
  font-weight: bold;
}


 </style>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hospital Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./doctor.php">Home</a>
      </div>
      <div class="navbar-nav">
          <a class="nav-item nav-link" href="./disppatient.php">View patients</a>
        </div>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="./search.php">Search patient</a>
        </div>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="./patient.php">Update patient</a>
        </div>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="./logout.php">Logout</a>
        </div>
      </nav>
      
      <?php
      echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4" >Welcome Doctor: <strong>'.$_SESSION["username"].'</strong> </h1>
      <p class="lead"> <strong>Date: '.date("Y.m.d").'</strong></p>
      <p class="lead"><strong> Day: '.date("l").'</strong></p>
        </div>'?>
        

</body>
</html>