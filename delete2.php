<?php
require_once 'config.php';
if(isset($_GET['id'])){
    $name= $_GET['id'];
    $sql = "DELETE FROM patient Where name = '$name'";
    $result= mysqli_query($con,$sql);
    header("location: patient.php");
}
?>