<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="style2.css">
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#34495e">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        	<img src="image/cms.png" width="35" height="45" class="d-inline-block align-top" alt="">
        <b>COMPLAINT MANAGEMENT SYSTEM</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"> HOME </a>
            </li>
            
               <li class="nav-item">
              <a class="nav-link active" href="userlogin.php"> USER LOGIN </a>
            </li>

                 <li class="nav-item">
              <a class="nav-link active" href="adminlogin.php"> ADMIN LOGIN </a>
            </li>



          </ul>
        </div>
      </div>
    </nav>

	<div id="main-wrapper">
	<center><h2><p style="font-family:'Courier New'">REGISTER HERE</p></h2></center>
			<div class="imgcontainer">
				<img src="image/user.png" alt="Avatar" class="avatar">
			</div>
		<form action="register.php" method="post">
		
			<div class="inner_container">
				<label><b><p style="font-family:'Courier New'">ID</p></b></label>
				<input type="text" placeholder="Type your ID" name="id" required>
				<label><b><p style="font-family:'Courier New'">EMAIL</p></b></label>
				<input type="text" placeholder="Type your Email" name="email" required>
				<label><b><p style="font-family:'Courier New'">NAME</p></b></label>
				<input type="text" placeholder="Type your Name" name="name" required>
				<label><b><p style="font-family:'Courier New'">PHONE NO.</p></b></label>
				<input type="text" placeholder="Type your Phone Number" name="Phone" required>
				<label><b><p style="font-family:'Courier New'">PASSWORD</p></b></label>
				<input type="password" placeholder="Type your Password" name="password" required>
				<label><b><p style="font-family:'Courier New'">CONFIRM PASSWORD</p></b></label>
				<input type="password" placeholder="Type your Password again" name="cpassword" required>
				<button class="sign_up_btn" name="register" type="submit">SIGN UP</button>
				<a href="userlogin.php"><button type="button" class="back_btn">BACK TO LOGIN</button></a>
			</div>
		</form>
		
<?php

			if(isset($_POST['register']))
			{
				$id=$_POST['id'];
				$email=$_POST['email'];
				$username=$_POST['name'];
				$phone=$_POST['Phone'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];

				

				if($password==$cpassword)
				{
					$q= "select * from user where id= '$id'";
                $query = mysqli_query($con,$q);
				
						if(mysqli_num_rows($query) == false)
						{
							$register =  "INSERT INTO user (ID, Email, Name, Password) VALUES ('$id', '$email', '$username', '$password')";
                            mysqli_query($con,$register);
                            $register1 = "INSERT INTO phone (id, Phone) VALUES ('$id', '$phone')";
                            mysqli_query($con,$register1);
							echo '<script type="text/javascript">alert("User Registered.. go to login page to login")</script>';
							//$_SESSION['id'] = $id;
							//$_SESSION['password'] = $password;
						}
						else
						{
							echo '<script type="text/javascript">alert("This ID Already exists.. Please try another ID!")</script>';
						}
					
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password does not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>