<?php
// Establish connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve existing task counts from the database
$sql_select = "SELECT * FROM task_counts";
$result_select = $conn->query($sql_select);

if ($result_select->num_rows == 0) {
    // If there are no existing records, insert new records for each status with count 0
    $sql_insert = "INSERT INTO task_counts (status, count) VALUES ('completed', 0), ('overdue', 0), ('pending', 0)";
    $conn->query($sql_insert);
}

// Update task counts based on the tasks table
$sql_update = "UPDATE task_counts 
               SET count = (SELECT COUNT(*) FROM tasks WHERE status = 'completed') 
               WHERE status = 'completed';
               UPDATE task_counts 
               SET count = (SELECT COUNT(*) FROM tasks WHERE status = 'overdue') 
               WHERE status = 'overdue';
               UPDATE task_counts 
               SET count = (SELECT COUNT(*) FROM tasks WHERE status = 'pending') 
               WHERE status = 'pending'";
$conn->multi_query($sql_update);

// Close the database connection
$conn->close();
?>
