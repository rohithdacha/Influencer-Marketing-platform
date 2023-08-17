<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "influencers";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get data from database based on one attribute
$attribute_value = $_GET['domain'];
$reqnumber=$_GET['number'];
$reqcity=$_GET['reqcity'];
$sql = "SELECT DISTINCT * FROM influencer_data WHERE domain = '$attribute_value' AND followers >='$reqnumber' AND city='$reqcity'";
$result = $conn->query($sql);

// Display data
if ($result->num_rows > 0) {
    echo '<div style="font-size: 30px; border:solid; border-color:white; padding:10px;">';
    echo "<center>";
    echo '<p style="font-size:50px;"><b>Influencers</b></p>';
    echo "<center>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<center><table style="border:solid black; border-color:blue; border-radius:20px; background-color:white; padding:20px;">';
    echo '<div style="font-size: 30px; padding:10px;">';
    echo "<tr><td><b>Name:</b></td><td>" . $row['name'] . "</td></tr>";
    echo '<tr><td><b>Social Media:</b></td><td><a href="' . $row["socialmedia"] . '">' . $row["socialmedia"] . '</a></td></tr>';
    echo '<tr><td><b>Phone Number:</b></td><td><a href="tel:+91' . $row["phno"] . '">' . $row["phno"] . '</a></td></tr>';
    echo '<tr><td><b>E-mail</b></td><td><a href="mailto:' . $row["email"] . '">' . $row["email"] . '</a></td></tr>';
    echo "<tr><td><b>Domain:</b></td><td>" . $row['domain'] . "</td></tr>";
    echo "<tr><td><b>Followers:</b></td><td>" . $row['followers'] . "</td></tr>";
    echo "<tr><td><b>City:</b></td><td>" . $row['city'] . "</td></tr>";
    echo "<tr><td><b>Message:</b></td><td>" . $row['message'] . "</td></tr>";
    echo "</table></center>";
  }
  echo '</div>';
} 
else {
  echo "<center>";
  echo '<div style="border:solid; padding:20px; width:80%; font-size:50px; margin-top:50px;">';
  echo "<b>Sorry, we are unable to find ideal influencer for you at the moment<b>";
  echo '</div>';
  echo "</center>";
}
// Close database connection
$conn->close();
?>
</body>
<html>


