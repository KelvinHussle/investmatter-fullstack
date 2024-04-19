<?php require("fetch.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
              <a class="nav-link" href="blog.php">Blog</a>
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
     <!-- New Post Section -->
<div class="container d-flex flex-column flex-sm-row">
<div class="container right my-5">
 <h3 class="text-center mt-3">Create Post</h3>
    
     <form id="post-form" action="post.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <label for="upload" class="form-label">Upload image</label>
            <input type="file" class="form-control" id="image" name="uploadfile">

          </div>
       <div class="mb-3">
         <label for="title" class="form-label">Post title</label>
         <input type="text" class="form-control grey-input" id="title" name="title" required>
       </div>
       <div class="mb-3">
         <label for="description" class="form-label">Post description</label>
         <textarea class="form-control grey-input" id="description" name="description" rows="4" required></textarea>
       </div>
       <button type="submit" class="btn btn-outline-primary form-control" value="submit">Post</button>
     </form>
     <a href="logout.php"><button type="submit" class="btn btn-outline-danger mt-3 form-control" name="logout">Log out</button></a> 
</div>

    <div class="container left">
    <h3 class="text-center mt-3">Recent Post</h3>
      <?php getblogtablepost('single_post')?>
    </div>
</div>
</body>

</html>