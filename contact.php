<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create connection
$conn = new mysqli($servername, 
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}

// Taking all 5 values from the form data(input)
$name =  $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
 
// Performing insert query execution
// here our table name is contact_info
$sql = "INSERT INTO contact_info  VALUES ('$name', 
    '$email','$subject','$message')";




if ($conn->query($sql) === TRUE) {
	echo "record inserted successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>