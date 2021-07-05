<?php
    $con = mysqli_connect('localhost', 'root', '', 'hospital');
    $sql= "SELECT * FROM `doctor`";
    $result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    
    <style>
   
   table{
       border: 2px solid black;
      position: absolute;
      width:550px;
      top: 150px;
      left: 350px;
      background-color:rgb(244, 246, 247);
      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
            0 10px 10px rgba(0,0,0,0.22);
   }
  
   th,td{
    border: 2px solid black;  
    padding:15px;
    

       }
   body{
   background:url("./css/b.jpg");
   background-repeat: no-repeat;
   background-size: cover;
     
   }
   button{
     position:absolute;
     top:50px;
     left:550px;

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
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Doctor
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="./dispreceptionist.php">Receptionist</a>
    </div>
  </div>
<table>
<thead>

    <th>
       Username
    </th>
    <th>
        Password
    </th>
    <th>
        Department
    </th>
</thead>


<tbody>
    <?php
        
      $sql="SELECT `username`, `password`, `department` FROM `doctor` ";
    $result= mysqli_query($con,$sql);
    while(

        $s= mysqli_fetch_array($result)

    ){


    
    
?>
    <tr> 
       <td><?php echo $s["username"]; ?></td>
       <td><?php echo $s["password"]; ?></td>
       <td><?php echo $s["department"]; }?> </td>
    </tr> 
</tbody>

</table>
</body>
</html>