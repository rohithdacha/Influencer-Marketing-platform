<?php
// Connect to MySQL database
//$servername = "localhost";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "influencers";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Initialize message variable
$message = "";
//$email = $_POST['email'];
//$sql = "SELECT * FROM influencer_data WHERE email = '$email'";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
  // The email already exists, show an error message
  //echo "Email already exists";
//}
//else{
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST['name'];
  $socialmedia = $_POST['social_media'];
  $phno = $_POST['phno'];
  $email = $_POST['email'];
  $domain = $_POST['domain'];
  $followers=$_POST['followers'];
  $city=$_POST['city'];
  $message = $_POST['mes'];

  // Insert form data into database
  $sql = "INSERT INTO influencer_data (name, socialmedia, phno, email, domain, followers, city, message) VALUES ('$name', '$socialmedia', '$phno', '$email', '$domain', '$followers', '$city', '$message')";
  if ($conn->query($sql) === TRUE) {
    $message = "Registered successfully";
  } else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
  }
  header('Location: index.html');
  exit();
}
//}

// Close database connection
$conn->close();
?>




