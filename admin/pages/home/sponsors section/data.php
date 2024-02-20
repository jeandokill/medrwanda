<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "EVENT";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

function getSponsorImages() {
    global $connection;

    $result = mysqli_query($connection, "SELECT * FROM sponsors");

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addSponsorImage($imagePath) {
    global $connection;

    $query = "INSERT INTO sponsors (image_path) VALUES ('$imagePath')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    return $result;
}

function removeSponsorImage($id, $imagePath) {
    global $connection;

    // Delete from the database
    $deleteQuery = "DELETE FROM sponsors WHERE id = '$id'";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if (!$deleteResult) {
        die("Delete query failed: " . mysqli_error($connection));
    }

    // Delete the file from the server
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    return $deleteResult;
}
?>
