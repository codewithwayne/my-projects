<?php
// Start the session
session_start();


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "login";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the staff ID and password from the form
    $staffID = $_POST['staff-id'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to fetch the lecturer data
    $sql = "SELECT * FROM lecturer_registration WHERE lecturer_id = '$staffID'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $lecturerData = $result->fetch_assoc();
        
        // Verify the entered password against the stored hashed password
        if (password_verify($password, $lecturerData['lecturer_password'])) {
            // Password is correct, login successful
            $_SESSION['lecturer'] = $lecturerData;
            header("Location: lecturer_module.php");
            exit();
        } else {
            // Password is incorrect, redirect back to lecturer_login.php with an error flag
            header("Location: lecturer_login.php?error=1");
            exit();
        }
    } else {
       
        header("Location: lecturer_login.php?error=1");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
