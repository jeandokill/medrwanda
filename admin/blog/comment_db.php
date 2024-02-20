<?php
require_once('comment.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $blogPostId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

    // Check for empty fields
    if (empty($blogPostId) || empty($email) || empty($comment)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Check if the email exists in the database
    if (isEmailInDatabase($email)) {
        // Add the comment and get the comment ID
        $commentId = addComment($blogPostId,$email, $comment);

        if ($commentId !== false) {
            // Directly reload the page after adding comment
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            // Error adding comment
            echo json_encode(['success' => false, 'message' => 'Error adding comment.']);
            exit();
        }
    } else {
        // Email not found in the database, show JavaScript alert
        ?>
        <script>
            alert('Email not found in the database');
        </script>
        <?php
    }
}

function isEmailInDatabase($email) {
    // Connect to your database (replace with your database credentials)
    $host = 'localhost';
    $username = "root";
    $password = "";
    $database = 'login_otp_db';

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the email exists
    $result = $stmt->num_rows > 0;

    // Close the database connection
    $stmt->close();
    $conn->close();

    return $result;
}
?>
