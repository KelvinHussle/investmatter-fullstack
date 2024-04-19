<?php

    require("database/db_connect.php");
    // Include the database connection file
require("database/db_connect.php");

// Validate and sanitize the provided ID (if any)
$id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : null;

    // Fetch the blog post with the given ID
    $sql = "SELECT * FROM single_post WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container">
        <h3 class="text-center mt-3">Update Post</h3>
        <form class="" action="update_post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
            <label for="Title" class="form-label">Title</label><br>
            <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>"><br>
            <label for="description" class="form-label">Description</label><br>
            <textarea name="description" class="form-control"><?php echo $row['description']; ?></textarea><br>
            <label for="image" class="form-label">Image</label><br>
            <input type="file" name="image" class="form-control"><br>
            <input type="submit" name="submit" value="Update" class="btn btn-success form-control mb-3">
            <a href="newpost.php" class="btn btn-dark form-control">Back</a>
        </form>
    </div>
        <?php
    } else {
        echo "No post found with ID: $id";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
</html>
