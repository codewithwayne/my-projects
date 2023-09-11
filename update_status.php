<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "remark";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the AJAX request
$id = $_POST["id"];
$status = $_POST["status"];

// Update the status in the database
$sql = "UPDATE submitted_retake SET status='$status' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
