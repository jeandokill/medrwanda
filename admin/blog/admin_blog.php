<?php
include("blog_db.php");
include("blog_data.php");
include("shift_to_recent.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
   // Check if a file was uploaded
if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
    // Check if the uploaded file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if (!$check) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
} else {
    echo "No file uploaded.";
    $uploadOk = 0;
}



    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is okay, try to upload the file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Handle author image upload
    $author_image_target_dir = "uploads/";
    $author_image_target_file = $author_image_target_dir . basename($_FILES["author_image"]["name"]);
    $author_image_uploadOk = 1;
    $author_imageFileType = strtolower(pathinfo($author_image_target_file, PATHINFO_EXTENSION));

    // Check if author image file is a valid image
    // Check if author image file was uploaded
if (isset($_FILES["author_image"]["tmp_name"]) && !empty($_FILES["author_image"]["tmp_name"])) {
    // Check if the uploaded file is a valid image
    $author_image_check = getimagesize($_FILES["author_image"]["tmp_name"]);
    if (!$author_image_check) {
        echo "Author image is not a valid image.";
        $author_image_uploadOk = 0;
    }
} else {
    echo "No author image file uploaded.";
    $author_image_uploadOk = 0;
}


    // Check author image file size
    if ($_FILES["author_image"]["size"] > 500000) {
        echo "Sorry, author image file is too large.";
        $author_image_uploadOk = 0;
    }

    // Allow certain author image file formats
    if ($author_imageFileType != "jpg" && $author_imageFileType != "png" && $author_imageFileType != "jpeg" && $author_imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for author image.";
        $author_image_uploadOk = 0;
    }

    // Check if $author_image_uploadOk is set to 0 by an error
    if ($author_image_uploadOk == 0) {
        echo "Sorry, your author image file was not uploaded.";
    } else {
        // If everything is okay, try to upload the author image file
        if (move_uploaded_file($_FILES["author_image"]["tmp_name"], $author_image_target_file)) {
            echo "The author image file " . htmlspecialchars(basename($_FILES["author_image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your author image file.";
        }
    }

    // Handle content image upload
    $content_image_target_dir = "uploads/";
    $content_image_target_file = $content_image_target_dir . basename($_FILES["content_image"]["name"]);
    $content_image_uploadOk = 1;
    $content_imageFileType = strtolower(pathinfo($content_image_target_file, PATHINFO_EXTENSION));

    // Check if content image file is a valid image
  // Check if content image file was uploaded
if (isset($_FILES["content_image"]["tmp_name"]) && !empty($_FILES["content_image"]["tmp_name"])) {
    // Check if the uploaded file is a valid image
    $content_image_check = getimagesize($_FILES["content_image"]["tmp_name"]);
    if (!$content_image_check) {
        echo "Content image is not a valid image.";
        $content_image_uploadOk = 0;
    }
} else {
    echo "No content image file uploaded.";
    $content_image_uploadOk = 0;
}


   
    // Check content image file size
    if ($_FILES["content_image"]["size"] > 500000) {
        echo "Sorry, content image file is too large.";
        $content_image_uploadOk = 0;
    }

    // Allow certain content image file formats
    if ($content_imageFileType != "jpg" && $content_imageFileType != "png" && $content_imageFileType != "jpeg" && $content_imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for content image.";
        $content_image_uploadOk = 0;
    }

    // Check if $content_image_uploadOk is set to 0 by an error
    if ($content_image_uploadOk == 0) {
        echo "Sorry, your content image file was not uploaded.";
    } else {
        // If everything is okay, try to upload the content image file
        if (move_uploaded_file($_FILES["content_image"]["tmp_name"], $content_image_target_file)) {
            echo "The content image file " . htmlspecialchars(basename($_FILES["content_image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your content image file.";
        }
    }

    // Retrieve form data
    $image = $target_file;  // Use the uploaded file path
    $title = $_POST["title"];
    $author_name = $_POST["author_name"];
    $author_image = $author_image_target_file;  // Use the uploaded author image path
    $author_social_twitter = $_POST["author_social_twitter"];
    $author_social_facebook = $_POST["author_social_facebook"];
    $author_social_instagram = $_POST["author_social_instagram"];
    $author_bio = $_POST["author_bio"];
    $publish_date = $_POST["publish_date"];
    $paragraph = $_POST["paragraph"];

    // Additional fields
    $blockquote = $_POST["blockquote"];
    $content1_subtitle = $_POST["content1_subtitle"];
    $content1_content = $_POST["content1_content"];
    $content2_subtitle = $_POST["content2_subtitle"];
    $content2_content = $_POST["content2_content"];
    $content3_subtitle = $_POST["content3_subtitle"];
    $content3_content = $_POST["content3_content"];
    $content_image = $content_image_target_file;  // Use the uploaded content image path

    // Insert data into 'blogs' table
    $stmt = $conn->prepare("INSERT INTO blogs (image, title, author_name, author_image, author_social_twitter, author_social_facebook, author_social_instagram, author_bio, publish_date, paragraph, blockquote, content1_subtitle, content1_content, content2_subtitle, content2_content, content3_subtitle, content3_content, content_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssss", $image, $title, $author_name, $author_image, $author_social_twitter, $author_social_facebook, $author_social_instagram, $author_bio, $publish_date, $paragraph, $blockquote, $content1_subtitle, $content1_content, $content2_subtitle, $content2_content, $content3_subtitle, $content3_content, $content_image);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Blog added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: admin_blog.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Blog</title>
    <link href="/EVENT/TheEvent/assets/img/favicon.png" rel="icon">
    <link href="/EVENT/TheEvent/assets/img/favicon.png" rel="apple-touch-icon">
</head>

<body>
    <div class="container mt-5">
        <h2>Add Blog</h2>
        <!-- HTML form for blog submission -->
        <form id="blogForm" action="admin_blog.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="mb-3">
                <label for="author_name" class="form-label">Author Name:</label>
                <input type="text" class="form-control" name="author_name">
            </div>

            <div class="mb-3">
                <label for="author_image" class="form-label">Author Image:</label>
                <input type="file" class="form-control" name="author_image">
            </div>

            <div class="mb-3">
                <label for="author_social_twitter" class="form-label">Twitter Link:</label>
                <input type="text" class="form-control" name="author_social_twitter">
            </div>

            <div class="mb-3">
                <label for="author_social_facebook" class="form-label">Facebook Link:</label>
                <input type="text" class="form-control" name="author_social_facebook">
            </div>

            <div class="mb-3">
                <label for="author_social_instagram" class="form-label">Instagram Link:</label>
                <input type="text" class="form-control" name="author_social_instagram">
            </div>

            <div class="mb-3">
                <label for="author_bio" class="form-label">Author Bio:</label>
                <textarea class="form-control" name="author_bio" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date:</label>
                <input type="date" class="form-control" name="publish_date">
            </div>

            <div class="mb-3">
                <label for="paragraph" class="form-label">Blog Paragraph:</label>
                <textarea class="form-control" name="paragraph" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="blockquote" class="form-label">Blog Quote:</label>
                <textarea class="form-control" name="blockquote" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="content1_subtitle" class="form-label">Content 1 Subtitle:</label>
                <input type="text" class="form-control" name="content1_subtitle">
            </div>

            <div class="mb-3">
                <label for="content1_content" class="form-label">Content 1 Content:</label>
                <textarea class="form-control" name="content1_content" rows="4"></textarea>
            </div>

            <!-- Repeat similar blocks for content 2 and content 3 -->

            <div class="mb-3">
                <label for="content2_subtitle" class="form-label">Content 2 Subtitle:</label>
                <input type="text" class="form-control" name="content2_subtitle">
            </div>

            <div class="mb-3">
                <label for="content2_content" class="form-label">Content 2 Content:</label>
                <textarea class="form-control" name="content2_content" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="content3_subtitle" class="form-label">Content 3 Subtitle:</label>
                <input type="text" class="form-control" name="content3_subtitle">
            </div>

            <div class="mb-3">
                <label for="content3_content" class="form-label">Content 3 Content:</label>
                <textarea class="form-control" name="content3_content" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="content_image" class="form-label">Content Image:</label>
                <input type="file" class="form-control" name="content_image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-primary" onclick="resetForm()">Add Blog</button>

        </form>

        <!-- Add this section below your form -->
        <div class="mt-5">
            <h2>Current Blogs</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Posted</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $currentBlogs = getBlogs(); 

                    if (!empty($currentBlogs)) {
                        foreach ($currentBlogs as $currentBlog) {
                            echo "<tr>";
                            echo "<td>" . $currentBlog['id'] . "</td>";
                            echo "<td>" . $currentBlog['publish_date'] . "</td>";
                            echo "<td>" . $currentBlog['author_name'] . "</td>";
                            echo "<td>" . $currentBlog['title'] . "</td>";
                            echo "<td>";
                            echo "<a href='view_blog.php?id=" . $currentBlog['id'] . "' class='btn btn-info btn-sm me-2'>View</a>";
                            echo "<a href='edit_blog.php?id=" . $currentBlog['id'] . "' class='btn btn-warning btn-sm me-2'>Edit</a>";
                            echo "<a href='delete_blog.php?id=" . $currentBlog['id'] . "' class='btn btn-danger btn-sm me-2' onclick='return confirm(\"Are you sure you want to delete this blog?\");'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                            
                            echo "<td>";
                            echo "<a href='shift_to_recent.php?id=" . $currentBlog['id'] . "' class='btn btn-success btn-sm me-2'>Shift to Recent Posts</a>";
                            echo "</td>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No blogs found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // JavaScript function to reset the form
    function resetForm() {
        document.getElementById("blogForm").reset();
    }
</script>

<a href="/EVENT/admin/index.php" class="btn btn-secondary mt-3" id="backbtn">Back to admin panel</a>
        <style>
            #backbtn
             {
                display: block;
                margin: auto;
                margin-top: 20px; 
                margin-right: 50%;
                margin-left: 30%;
                background-color: blue;
                
                /* You can adjust the margin-top as needed */
            }
        </style>
    </div>
</body>

</html>

