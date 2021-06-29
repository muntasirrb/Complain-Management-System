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
    </nav><?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "complain_management";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

//$sql = "select * from complain where User_ID like '%$search%' or Status like '%$search%' or Subject like '%$search%' ";

/*$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["User_ID"]."  ".$row["Complain_ID"]."  ".$row["Status"]."<br>";

}
} else {
	echo "0 records";
}
*/
$result = mysqli_query($conn,"select * from complain  where Complain_ID like '%$search%' or User_ID like '%$search%' or Status like '%$search%' or Subject like '%$search%' or Year(Date) like '%$search%' ");

echo'<link rel="stylesheet" href="./css2/style.css">
<link rel="stylesheet" href="./css2/bootstrap.min.css">';

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
</tr>';


while($row = mysqli_fetch_array($result))
{
echo '<tr style="border-width: 2px">';
echo '<td scope="row" style="border-width: 2px">' . $row["Complain_ID"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Subject"] . '</td>';
//echo '<td style="border-width: 2px">' . $row["Name"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Date"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Text"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Comment"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Status"] . '</td>';
echo '<td style="border-width: 2px">' . $row["User_ID"] . '</td>';
echo '<td style="border-width: 2px">' . $row["Feedback"] . '</td>';
echo '</tr>';
}

$conn->close();

?>
</body>
</html>