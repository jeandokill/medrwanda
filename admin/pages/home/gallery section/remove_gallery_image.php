<?php
include("data.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $imagePath = getGalleryImagePath($id);

    if ($imagePath) {
        // Delete from database
        removeGalleryImage($id, $imagePath);
        
        // Delete from uploads folder
        unlink($imagePath);

        header("Location: admin_gallery.php");
        exit();
    }
}
?>
