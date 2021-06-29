<?php
   session_start(); //starts the session
   require 'dbconfig/config.php';
?>
<?php


    $con = mysqli_connect("localhost", "root","") or die(mysql_error());//Connect to server
    mysqli_select_db($con, "complain_management") or die("Cannot connect to database"); //Connect to database
    $details = $_POST['value'];
    mysqli_error($con);
    $id = $_SESSION['id'];
    $column = $_POST['drop'];
    mysqli_query($con, "UPDATE user SET $column='$details' WHERE id='$id'");
    mysqli_query($con, "UPDATE phone SET $column='$details' WHERE id='$id'");

    Print '<script>window.location.assign("userprofile.php");</script>';

?>