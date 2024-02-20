<?php
include("data.php"); // Include database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    // Handle file upload
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // File has been successfully uploaded
        $imagePath = $targetFile;

        // Social media links
        $twitter = mysqli_real_escape_string($connection, $_POST['twitter']);
        $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);
        $linkedin = mysqli_real_escape_string($connection, $_POST['linkedin']);
        $instagram = mysqli_real_escape_string($connection, $_POST['instagram']);

        // Add new team member to the database with social media links
        $query = "INSERT INTO team_members (name, role, image_path, twitter, facebook, linkedin, instagram) 
                  VALUES ('$name', '$role', '$imagePath', '$twitter', '$facebook', '$linkedin', '$instagram')";
        mysqli_query($connection, $query);

        // Redirect to admin panel or wherever you want
        header("Location: admin_team.php");
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
