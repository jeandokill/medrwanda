<!-- delete_team_member.php -->
<?php
include("data.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    mysqli_query($connection, "DELETE FROM team_members WHERE id = '$id'");
    
    // Redirect to admin panel or wherever you want
    header("Location: admin_team.php");
    exit();
}
?>
