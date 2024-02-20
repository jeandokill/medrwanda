<?php
include 'data.php';

// Function to delete a testimonial by index
function deleteTestimonial($index) {
    global $testimonials;
    if (isset($testimonials[$index])) {
        $imagePath = $testimonials[$index]['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the associated image file
        }
        unset($testimonials[$index]);
        saveTestimonials();
    }
}

// Function to save testimonials data
function saveTestimonials() {
    global $testimonials;
    $data = '<?php $testimonials = ' . var_export($testimonials, true) . '; ?>';
    file_put_contents('data.php', $data);
}

// Check if index is set in the query parameters
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    deleteTestimonial($index);
}

// Redirect back to admin_testimonials.php
header('Location: admin_testmonial.php');
exit();
?>
