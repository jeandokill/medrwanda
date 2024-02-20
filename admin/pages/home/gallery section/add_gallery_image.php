<!-- add_gallery_image.php -->
<?php
include("data.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imagePath = $targetFile;
        addGalleryImage($imagePath);
        header("Location: admin_gallery.php");
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
