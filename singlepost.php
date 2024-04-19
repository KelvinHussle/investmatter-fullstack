<?php
require("database/db_connect.php");
require("fetch.php");

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query to retrieve the blog post with the given ID
    $sql = "SELECT * FROM single_post WHERE id = $id";
    $result = mysqli_query($conn, $sql);
	$post = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 0) {
        
        echo 'Post not found';
} 
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $post['title']?></title>
</head>
<body>
	<div>
		<h2><?php echo $post['title'] ?></h2>
		<img src="uploads/<?php echo $post['image']?>" class="img-fluid" alt="fantastic cms" style="width:500px;height:450px">
		<p><?php echo $post['description'] ?></p>
</div>
</body>
</html>