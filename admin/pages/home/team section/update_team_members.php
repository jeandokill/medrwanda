<!-- update_team_member.php -->
<?php
include("data.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    // Handle file upload if a new image is provided
    if ($_FILES["image"]["size"] > 0) {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // File has been successfully uploaded
            $imagePath = $targetFile;

            // Update team member data in the database
            $query = "UPDATE team_members SET name='$name', role='$role', image_path='$imagePath' WHERE id='$id'";
            mysqli_query($connection, $query);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // No new image uploaded, update name and role only
        $query = "UPDATE team_members SET name='$name', role='$role' WHERE id='$id'";
        mysqli_query($connection, $query);
    }

    // Redirect to admin panel or wherever you want
    header("Location: admin_team.php");
    exit();
}
?>
