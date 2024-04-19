<?php
function getblogridposts($table, $currentPage = 1, $postsPerPage = 4) {

require("database/db_connect.php");

// Calculate starting post for the current page (if invalid, set to 1)
$currentPage = max(1, (int)$_GET['page']); // Use $_GET['page'] for current page

$startIndex = ($currentPage - 1) * $postsPerPage;

// Count total number of posts
$totalPostsSql = "SELECT COUNT(*) AS total_posts FROM $table";
$totalPostsResult = mysqli_query($conn, $totalPostsSql);
$totalPostsRow = mysqli_fetch_assoc($totalPostsResult);
$totalPages = ceil($totalPostsRow['total_posts'] / $postsPerPage);

// Get posts for the current page
$sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $startIndex, $postsPerPage";
if ($result = mysqli_query($conn, $sql)) {
  $rowcount = mysqli_num_rows($result);

  // Display posts if any found
  if ($rowcount > 0) {
	while ($griditem = mysqli_fetch_assoc($result)) {
	  echo '<div class="col-md-6 blog-grid-top">
			  <div class="b-grid-top">
				<div class="blog_info_left_grid card mb-5" style="width: 22rem;">
				  <a href="singlepost.php?id=' . $griditem['id'] . '">
					<img src="uploads/' . $griditem['image'] . '" class="card-img-top" alt="fantastic cms" style="width:350px;height:250px">
				  </a>
				  <div class="d-flex flex-row justify-content-between mt-3">
					<h5 class="card-title text-center">
					  ' . $griditem['title'] . '
					</h5>
					 <p>' . $griditem['created_at'] . '</p>
				  </div>
				  <a href="singlepost.php?id=' . $griditem['id'] . '" class="btn btn-sm btn-primary">Read More</a>
				</div>
			  </div>
			</div>';
	}
  } else {
	echo 'No Posts To Fetch';
  }

  mysqli_free_result($result); // Close post results for current page
}

// Pagination buttons (adjust styling as needed)
if ($totalPages > 1) {
  echo '<nav aria-label="Page navigation example">';
  echo '<ul class="pagination justify-content-center">';

  // Previous button (disabled if on first page)
  if ($currentPage > 1) {
	echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
  } else {
	echo '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
  }

  // Page number links
  for ($i = 1; $i <= $totalPages; $i++) {
	$activeClass = ($i === $currentPage) ? ' active' : '';
	echo '<li class="page-item' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
  }

  // Next button (disabled if on last page)
  if ($currentPage < $totalPages) {
	echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
  } else {
	echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
  }

  echo '</ul>';
  echo '</nav>';
}

mysqli_free_result($totalPostsResult); // Close total posts result set
}


function getblogtablepost($table, $currentPage = 1, $postsPerPage = 4) {

	require("database/db_connect.php");
  
	// Calculate starting post for the current page (if invalid, set to 1)
	$currentPage = max(1, (int)$_GET['page']); // Use $_GET['page'] for current page
  
	// Count total number of posts
	$totalPostsSql = "SELECT COUNT(*) AS total_posts FROM $table";
	$totalPostsResult = mysqli_query($conn, $totalPostsSql);
	$totalPostsRow = mysqli_fetch_assoc($totalPostsResult);
	$totalPages = ceil($totalPostsRow['total_posts'] / $postsPerPage);
  
	// Get posts for the current page
	$startIndex = ($currentPage - 1) * $postsPerPage;
	$sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $startIndex, $postsPerPage";
	if ($result = mysqli_query($conn, $sql)) {
	  $rowcount = mysqli_num_rows($result);
  
	  // Display posts if any found
	  if ($rowcount > 0) {
		echo '<div class="table-responsive ">
		  <table class="table align-start table-striped table-hover">
			<thead>
			  <tr>
				<th>id</th>
				<th>Image</th>
				<th>Title</th>
				<th>Description</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>';
  
		while ($griditem = mysqli_fetch_assoc($result)) {
		  echo '<tr>
					<td><a href="singlepost.php?id=' . $griditem['id'] . '" style="display:none">' . $griditem['id'] . '</a></td>
					<td><img src="uploads/' . $griditem['image'] . '" class="img-fluid" alt="fantastic cms" style="width:50px;height:45px"></td>
					<td>' . $griditem['title'] . '</td>
					<td>' . $griditem['description'] . '</td>
					
					<td>
					  <a href="delete_post.php?id=' . $griditem['id'] . '" type="button" class="btn btn-danger btn-sm ">Delete</a>
  
					  <a href="update_form.php?id=' . $griditem['id'] . '" type="button" class="btn btn-success btn-sm ">Update</a>
					</td>
				  </tr>';
		}
  
		echo '</tbody>
		  </table>
		</div>';
	  } else {
		echo 'No Posts To Fetch';
	  }
  
	  mysqli_free_result($result); // Close post results for current page
	}
  
	// Pagination buttons (adjust styling as needed)
	if ($totalPages > 1) {
	  echo '<nav aria-label="Page navigation example">';
	  echo '<ul class="pagination justify-content-center">';
  
	  // Previous button (disabled if on first page)
	  if ($currentPage > 1) {
		echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
	  } else {
		echo '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
	  }
  
	  // Page number links
	  for ($i = 1; $i <= $totalPages; $i++) {
		$activeClass = ($i === $currentPage) ? ' active' : '';
		echo '<li class="page-item' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
	  }
  
	  // Next button (disabled if on last page)
	  if ($currentPage < $totalPages) {
		echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
	  } else {
		echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
	  }
  
	  echo '</ul>';
	  echo '</nav>';
	}
  
	mysqli_free_result($totalPostsResult); // Close total posts result set
  }
  
?>