<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "EVENT";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_close($connection);
?>

