<?php
// db.php
$host = "localhost";
$user = "root";
$password = "";
$database = "EVENT";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// data.php
function getTeamSectionData() {
    global $connection;

    $result = mysqli_query($connection, "SELECT * FROM team_section LIMIT 1");

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    return mysqli_fetch_assoc($result);
}

function updateTeamSectionData($newTitle, $newSubtitle) {
    global $connection;

    $query = "UPDATE team_section SET title = '$newTitle', subtitle = '$newSubtitle' LIMIT 1";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Add debugging
    echo "Rows affected: " . mysqli_affected_rows($connection);

    return $result;
}



function updateTeamMemberData($id, $newName, $newRole, $twitter, $facebook, $linkedin, $instagram) {
    global $connection;

    // Update the team member details
    $query = "UPDATE team_members SET name = '$newName', role = '$newRole', twitter = '$twitter', facebook = '$facebook', linkedin = '$linkedin', instagram = '$instagram' WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }
}

