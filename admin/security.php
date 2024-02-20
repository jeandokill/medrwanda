<?php
session_start();
include('database/dbconfig.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}


// security.php
function getAdminUsername($connection)
 {
    $email = $_SESSION['username']; // Assuming you store the admin's email in the session
    $query = "SELECT username FROM register WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['username'];
    } else {
        return "Admin"; // Default value if the username is not found
    }
}

?>