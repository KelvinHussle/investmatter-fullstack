<?php

require("database/db_connect.php");

$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

// Escape the search term to prevent SQL injection
$searchTerm = mysqli_real_escape_string($conn, $searchTerm);

// Adjust the query based on your table structure and search criteria
$sql = "SELECT * FROM single_post WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%' ORDER BY id DESC LIMIT 4"; // Limit to 8 results for pagination example

$currentPage = max(1, (int)$_GET['page']); // Use $_GET['page'] for current page
$postsPerPage = 4; // Adjust as needed

$startIndex = ($currentPage - 1) * $postsPerPage;

$totalPostsSql = "SELECT COUNT(*) AS total_posts FROM single_post WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'"; // Modified total posts query based on search term
$totalPostsResult = mysqli_query($conn, $totalPostsSql);
$totalPostsRow = mysqli_fetch_assoc($totalPostsResult);
$totalPages = ceil($totalPostsRow['total_posts'] / $postsPerPage);

if ($result = mysqli_query($conn, $sql)) {
  $rowcount = mysqli_num_rows($result);

  if ($rowcount > 0) {
    echo '<h2>Search Results for "' . $searchTerm . '"</h2>';

    // Include your existing code to display posts and pagination (replace `getblogtablepost` with the actual function name)
    // ... your_function_to_display_posts($result, $currentPage, $postsPerPage);

  while ($griditem = mysqli_fetch_assoc($result)) {
    echo '<tr>
              <td><a href="singlepost.php?id=' . $griditem['id'] . '" style="display:none">' . $griditem['id'] . '</a></td>
              <td><img src="uploads/' . $griditem['image'] . '" class="img-fluid" alt="fantastic cms" style="width:50px;height:45px"></td>
              <td>' . $griditem['title'] . '</td>
              <td>' . $griditem['description'] . '</td>
            </tr>';
  }

  echo '</tbody>
      </table>
    </div>';
  } else {
    echo 'No results found for "' . $searchTerm . '".';
  }

  mysqli_free_result($result);
} else {
  echo 'Error: ' . mysqli_error($conn);
}

mysqli_free_result($totalPostsResult); // Close total posts result set

?>
