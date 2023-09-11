<?php
session_start();

// Check if the lecturer is logged in and the session is set
if (isset($_SESSION['lecturer'])) {
    $lecturerInfo = $_SESSION['lecturer'];
    $staffID = $lecturerInfo['lecturer_id'];
    $fullName = $lecturerInfo['lecturer_name'];

    // Assuming you have already established a database connection.
    // Replace the database credentials with your own.
    $servername = "localhost";
    $username = "root";
    $password = ""; // Leave the password blank
    $dbname = "login";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the updated details from the form
        $fullName = $_POST['lecturer_full_name'];
        $email = $_POST['lecturer_email'];
        $password = $_POST['lecturer_password'];

        // Update the lecturer's details in the database
        $sql = "UPDATE lecturer_registration SET lecturer_name = '$fullName', lecturer_email = '$email', lecturer_password = '$password' WHERE lecturer_id = '$staffID'";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to the lecturer_profile.php page after updating
            header("Location: lecturer_profile.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // If the lecturer is not logged in, redirect to the login page
    header("Location: lecturer_login.php");
    exit();
}
?>
