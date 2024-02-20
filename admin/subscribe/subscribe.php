<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newsletter";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Form Submission Handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];

  // Check if email already exists
  $check_sql = "SELECT * FROM subscribers WHERE email = '$email'";
  $result = $conn->query($check_sql);
  if ($result->num_rows > 0) {
    // Email already exists
    echo 'exists';
  } else {
    // Insert into Database
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";
    if ($conn->query($sql) === TRUE) {
      echo "success";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$conn->close();
?>
