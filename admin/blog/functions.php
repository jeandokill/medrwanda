<?php

function getCommentCount($blogId) {
    // Assuming you are using MySQL as the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    $dbname = "blog";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch comment count from the database
    $sql = "SELECT COUNT(*) AS comment_count FROM tbl_comments WHERE blog_id = $blogId";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $commentCount = $row['comment_count'];
    } else {
        $commentCount = 0;
    }

    // Close connection
    $conn->close();

    return $commentCount;
}
