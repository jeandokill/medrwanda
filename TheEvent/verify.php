<?php
// verify.php

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Verify the token against the database
    $sql = "SELECT * FROM register WHERE email='$email' AND verification_token='$token'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Update the user status to "verified" in the database
        $updateSql = "UPDATE register SET status='verified' WHERE email='$email'";
        mysqli_query($connection, $updateSql);

        echo "Thank you for verifying your email. You can now <a href='index.php'>login</a> to access pro features.";
    } else {
        echo "Invalid verification link.";
    }
} else {
    echo "Invalid request.";
}
