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
    $enteredPassword = $_POST['password'];

    // Prepare and execute the SQL statement to fetch the lecturer data
    $sql = "SELECT * FROM lecturer_registration WHERE lecturer_id = '$staffID'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $lecturerData = $result->fetch_assoc();
        
        // Verify the entered password against the stored hashed password
        if (password_verify($enteredPassword, $lecturerData['lecturer_password'])) {
            // Password is correct, login successful
            $_SESSION['lecturer'] = $lecturerData;
            header("Location: lecturer_module.php");
            exit();
        } else {
            echo '<script>alert("Password is incorrect. Please type a different password."); window.location.href = "lecturer_login.php";</script>';
        }
    } else {
          echo '<script>alert("StaffId is does not exist. Please type a different staffID."); window.location.href = "lecturer_login.php";</script>';
    }
}

// Close the database connection
$conn->close();
?>
