<?php
    $con = mysqli_connect('localhost', 'root', '', 'hospital');
    $sql= "SELECT * FROM `doctor`";
    $result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
     body{
    background-image:url("./css/bg2.jpg");
    background-repeat:no-repeat;
    background-size:cover;
  }
  th,tr{
      color: whitesmoke;
      font-size: 15px;
    }
    th,td{
      border: 2px solid rgb(255, 255, 255);
    }
  </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
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
        <a class="nav-item nav-link" href="./addpatient.php">Add Patient</a>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./disppatient.php">Old patient</a>
    </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./dispdoctor1.php">Doctor</a>
    </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./patient.php">Delete patient</a>
    </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./logout.php">Logout</a>
    </div>
</nav>
<table class="table ">
  <thead>   
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Department</th>
      </td>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql= "SELECT * FROM `doctor`";
        $result = mysqli_query($con,$sql);
        while($s = mysqli_fetch_array($result)){
        ?>
            <tr>
            <td><?php echo $s['username']; ?></td>
            <td><?php echo $s['password']; ?></td>
            <td><?php echo $s['department'];} ?></td>
            </tr>
        
  </tbody>
</table>
    
</body>
</html>