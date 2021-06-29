<?php
$con=mysqli_connect ("localhost", "root", "") or die ("Unable to connect");
mysqli_select_db($con,"complain_management") or die("Cannot connect to database"); //Connect to database
?>