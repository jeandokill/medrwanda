<?php
include("data.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $newTitle = mysqli_real_escape_string($connection, $_POST['section_title']);
    $newSubtitle = mysqli_real_escape_string($connection, $_POST['section_subtitle']);

    // Debugging statements
    echo "Received Title: " . $newTitle . "<br>";
    echo "Received Subtitle: " . $newSubtitle . "<br>";

    // Update team section data
    updateTeamSectionData($newTitle, $newSubtitle);

    // Redirect back to admin_team.php
    header("Location: admin_team.php");
    exit();
} else {
    // If the form is not submitted, redirect back to admin_team.php
    header("Location: admin_team.php");
    exit();
}
