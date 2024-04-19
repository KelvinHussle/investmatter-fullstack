
<?php
// Start session
session_start();
require("database/db_connect.php");

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if username or email exists
    $sql = "SELECT * FROM login_info WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if ($password ==$row["password"]) {
            // Login successful

            $_SESSION["username"] = $row["username"];
            // Redirect to a new page
            header("Location: newpost.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid password!";
        }
    } else {
        // Username not found
        echo "Username or not found!";
    }
}
?>