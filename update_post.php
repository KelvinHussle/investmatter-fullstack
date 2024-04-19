<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    // Include database connection file
    require("database/db_connect.php");

    // Escape form values to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Check if a file was uploaded
    if($_FILES['image']['name'] != '') {
        // File upload logic here, save file and update image field in the database
        $image = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $target_dir = "uploads/";
        move_uploaded_file($temp_name, $target_dir . $image);

        // SQL query to update post with image
        $sql = "UPDATE single_post SET title = '$title', description = '$description', image = '$image' WHERE id = $id";
    } else {
        // SQL query to update post without changing image
        $sql = "UPDATE single_post SET title = '$title', description = '$description' WHERE id = $id";
    }

    // Execute SQL query
    if(mysqli_query($conn, $sql)) {
        // Post updated successfully
        header("Location: newpost.php");
    } else {
        // Error occurred while updating post
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // If form is not submitted, redirect back to the form page
    header("Location: newpost.php");
    exit;
}
?>
