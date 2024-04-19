<?php
session_start();
require("fetch.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>our Blog</title>
    <style>

    </style>
</head>
<body>
    <!-- Navigation section -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid ms-4">
        <a class="navbar-brand " href="#">Investmatter Group</a>
        <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon bg-light"></span>
        </button>
        <div class="container-fluid mx-2">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active " aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item ms-3">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item ms-3">
              <a class="nav-link" href="services.html">Services</a>
            </li>
            <li class="nav-item ms-3">
              <a class="nav-link" href="blog.html">Blog</a>
            </li>
            <li class="nav-item ms-3">
              <a class="nav-link" href="contacts.html">Contact Us</a>
            </li>
          </ul>
          <ul class="navbar-nav me-4">
              <li class="nav-item">
                  <a href="contacts.html" class="btn  service-button"
                  style="--bs-btn-padding-y: .38rem; --bs-btn-padding-x: .95rem; --bs-btn-font-size: .95rem; --bs-btn-border-radius:.75rem;">Get Started</a>
                </li>
          </ul>
        </div>
      </div>
</nav>

<a type="button" class="btn btn-primary" href="check.php"> Create Post </a>

</section>
	<!--/main-->
	<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<!--grid blogs below-->
					<div class="blog-girds-sec">
						<div class="row">
							<?php getblogridposts("single_post",$currentPage)?>
							<!--bloggrids-->
						</div>
					</div>
				</div>
				<!--//left-->
</div>
</section>
<div class="container mt-3">
    <h1>Search Blog Posts</h1>
    <form action="search.php" method="GET" class="mb-3">
      <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search posts by title or description">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>

    <?php
      // Include results.php here to display search results

    ?>
  </div>

</body>
</html>