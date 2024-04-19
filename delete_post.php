<?php

// Include the database connection file
require("database/db_connect.php");

// Validate and sanitize the provided ID (if any)
$id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : null;

if ($id !== null) {
    // Prepare and execute the SQL query using prepared statements (recommended)
    $stmt = mysqli_prepare($conn, "DELETE FROM single_post WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id); // Bind ID parameter as integer

    if (mysqli_stmt_execute($stmt)) {
        // Success: Redirect or provide a success message
        header("Location: newpost.php"); // Redirect to new post page
        exit(); // Prevent further code execution on success
    } else {
        echo "Error deleting post: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt); // Close the prepared statement
} else {
    echo "ID parameter is missing.";
}

?>
