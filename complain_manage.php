<?php
   session_start(); //starts the session
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
<body style="background-color:#FFA500">
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
<form class="form-inline" action="search3.php" method="POST">
<p align="center">
	<div class="form-group mx-sm-3 mb-2">
<input class="form-control-lg mr-sm-2" type="text" name="search" placeholder="Search by ID/Status/Year/Subject....">
<button class="btn btn-primary  my-4 my-sm-2" type="submit"><b>SUBMIT</b></button>
</div>
</p>
</form>

<?php
if(isset($_POST["status-pending"])){
	$query_run = mysqli_query($con,'UPDATE complain SET Status = "Pending" WHERE complain.Complain_ID = '.$_POST["complain_id"]);
}
if(isset($_POST["status-processed"])){
	$query_run = mysqli_query($con,'UPDATE complain SET Status = "Processed" WHERE complain.Complain_ID = '.$_POST["complain_id"]);
}
if(isset($_POST["status-resolved"])){
	$query_run = mysqli_query($con,'UPDATE complain SET Status = "Resolved" WHERE complain.Complain_ID = '.$_POST["complain_id"]);
}
if(isset($_POST["givefeedback"])){
	$query_run = mysqli_query($con,'UPDATE complain SET Comment = "'.$_POST["feedback"].'" WHERE complain.Complain_ID = '.$_POST["complain_id"]);
}

$result = mysqli_query($con,"SELECT * FROM complain INNER JOIN user ON complain.User_ID = user.ID;");





echo'<table id="search-table" class="table table-dark table-bordered table-striped">
<tr>
	<th scope="col">Complain_ID</th>
	<th scope="col">Subject</th>
	<th scope="col">Date</th>
	<th scope="col">Text</th>
	<th scope="col">Comment</th>
	<th scope="col">Status</th>
	<th scope="col">User_ID</th>
	<th scope="col">Feedback</th>
	<th scope="col">Change Status</th>
	<th scope="col">Give Comment</th>
</tr>';


while($row = mysqli_fetch_array($result))
{
echo '<tr style="border-width: 2px">';
echo '<td scope="row" style="border-width: 2px">' . $row["Complain_ID"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Subject"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Date"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Text"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Comment"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Status"] . '</td>';
echo '<td style="border-width: 2px">' . $row["User_ID"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Feedback"] . '</td>';
echo '<td style="border-width: 2px">
	<form action="complain_manage.php" class="d-flex" method="POST">
		<input type="hidden" name="complain_id" value="'.$row["Complain_ID"].'">
		<button name="status-pending" class="btn btn-primary m-1" type="submit">Pending</button>
		<button name="status-processed" class="btn btn-primary m-1" type="submit">Processed</button>
		<button name="status-resolved" class="btn btn-primary m-1" type="submit">Resolved</button>
	</form>

</td>';
echo '<td style="border-width: 2px">
	<form action="complain_manage.php" class="d-flex" method="POST">
		<input type="hidden" name="complain_id" value="'.$row["Complain_ID"].'">
		<input type="type" name="feedback" style="background: transparent; border-width: 10; color: white"  placeholder="Give Comment">
		<input type="submit" name="givefeedback" style="display:none" value="givefeedback" />
		</form>

</td>';
echo '</tr>';
}

?>
</body>
</html>