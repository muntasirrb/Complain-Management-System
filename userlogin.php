<?php
   session_start(); //starts the session
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
<body style="background-color:#FFA500">
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
	<center><h2><p style="font-family:'Courier New'"><b>USER LOGIN</b></p></h2></center>
			<div class="imgcontainer">
				<img src="image/user.png" alt="Avatar" class="avatar">
			</div>
		<form action="userlogin.php" method="post">
			<div class="inner_container">
				<label><b><p style="font-family:'Courier New'">USER ID</p></b></label>
				<input type="text" placeholder="Enter User ID" name="id" required>
				<label><b><p style="font-family:'Courier New'">PASSWORD</p></b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">LOGIN</button>
				<a href="register.php"><button type="button" class="register_btn">CLICK HERE TO REGISTER</button></a>
			</div>
		</form>
		
		<?php
                    $host = "localhost"; 
                    $user = "root"; // User /
                    $password = ""; // Password /
                    $dbname = "complain_management"; // Database name 
                    $con = mysqli_connect($host, $user, $password, $dbname);
//                    $con=mysqli_connect("localhost", "root","") or die(mysql_error());
                    // Check connection
                    if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                    }
			if(isset($_POST['login']))
			{
				$id=$_POST['id'];
				$password=$_POST['password'];
				$q = "select * from user where id='$id' and password='$password' ";
				//echo $query;
				$query = mysqli_query($con,$q);
				//echo mysql_num_rows($query_run);
				//if($query==false)
				//{
					if(mysqli_num_rows($query))
					{
					$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
					
					$_SESSION['id'] = $id;
					$_SESSION['password'] = $password;
					//echo "id: ".$_SESSION['id']." ".$id."password: ".$_SESSION['password']." ". $password;
					
					//header( "Location: homepage.php");
					echo("<script>window.location.href = 'userdash.php';</script>");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				//}
				//else
				//{
					//echo '<script type="text/javascript">alert("Database Error")</script>';
				//}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>