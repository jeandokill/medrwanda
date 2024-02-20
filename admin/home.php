

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="width: 100%;">
        <a class="navbar-brand ml-5" href="../admin/index.php">back to dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h2 class="mb-4">User Management</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your PHP file that contains the MainClass and database connection
                    include '../login/MainClass.php';

                    // Instantiate MainClass
                    $class = new MainClass();
                    $conn = $class->db_connect();

                    // Fetch users from the database
                    $sql = "SELECT * FROM `users`";
                    $result = $conn->query($sql);

                    // Loop through the fetched users and display them in the table
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $fullName = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td><img src='../login/{$row['profile_picture']}' class='img-thumbnail' width='100' height='100'></td>";
                            echo "<td>{$fullName}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['password']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
