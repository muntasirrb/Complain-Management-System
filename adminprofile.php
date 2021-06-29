<?php
   session_start(); //starts the session
   require 'dbconfig/config.php';
?>
<!DOCTYPE html>
    <html>
        <head>
            <title> Admin Profile </title>
            <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="style2.css">
         <link rel="preconnect" href="https://fonts.gstatic.com">

        </head>
        <body style="background-image: url('image/bg3.png');">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="admindash.php">
          <img src="image/cms.png" width="35" height="45" class="d-inline-block align-top" alt="">
        <b> ADMIN: <?php echo $_SESSION['id']?></b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            
            <li class="nav-item">
              <a class="nav-link active" href="complain_manage.php"> MANAGE COMPLAINS </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="adminprofile.php"> ACCOUNT DETAILS </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="index.php"> LOGOUT </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

                    <?php
                    $con = mysqli_connect("localhost", "root","") or die(mysql_error());
      mysqli_select_db($con, "complain_management") or die("Cannot connect to database");
                    if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                    }
                    $id = $_SESSION['id'];
                    $q="SELECT * FROM admin WHERE id = '$id'";
                    $query = mysqli_query($con,$q);
                    $row = mysqli_fetch_assoc($query);
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone no.'];
                    ?>

<div  style="text-align:left; padding-top: 150px; margin-bottom: 55px; padding-left: 1150px; padding-right: 200px">
                    <div class="thumb-content">

                        
                <div class="card shadow-sm mb-2">
                  <div class="card-body d-flex justify-content-start align-items-center mx-4">
                    <div class="d-flex justify-content-between align-items-center">  
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <div class="mb-2" style="width:120%; font-size: 170%; text-align: center; padding-left: 90px"><b>ADMIN ID: </b><?php echo $id ?></div>
                    </div>
                  </div>
                </div>

                <div class="card shadow-sm mb-2">
                  <div class="card-body d-flex justify-content-start align-items-center mx-4">
                    <div class="d-flex justify-content-between align-items-center">  
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <div class="mb-2" style="width:120%; font-size: 170%; text-align: center; padding-left: 90px"><b>ADMIN NAME: </b><?php echo $name ?></div>
                    </div>
                  </div>
                </div>

                <div class="card shadow-sm mb-2">
                  <div class="card-body d-flex justify-content-start align-items-center mx-4">
                    <div class="d-flex justify-content-between align-items-center">  
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <div class="mb-2" style="width:120%; font-size: 170%; text-align: center; padding-left: 90px"><b>EMAIL: </b><?php echo $email ?></div>
                    </div>
                  </div>
                </div>

                <div class="card shadow-sm mb-2">
                  <div class="card-body d-flex justify-content-start align-items-center mx-4">
                    <div class="d-flex justify-content-between align-items-center">  
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <div class="mb-2" style="width:120%; font-size: 170%; text-align: center; padding-left: 90px"><b>PHONE NO: </b><?php echo $phone ?></div>
                    </div>
                  </div>
                </div>
              </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                </body>

    </html>