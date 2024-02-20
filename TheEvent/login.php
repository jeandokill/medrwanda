<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "User not found";
    }
}
?>