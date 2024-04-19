<?php
require("database/db_connect.php");
// Process form submission
    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = __DIR__ ."/uploads/" .$image;
    $currentDate = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:II:SS
    
    //file_get_contents($_FILES['image']['tmp_name']);

// Prepare SQL query
$sql = "INSERT INTO single_post (title, description, image,created_at) VALUES (?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters to prevent SQL injection
mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $image,$currentDate);
// Execute the query
mysqli_stmt_execute($stmt);

if (move_uploaded_file($tempname, $folder)) {
  header("Location: newpost.php");
} else {
  echo "Error uploading post: " . mysqli_error($conn);
}
mysqli_close($conn);
?>