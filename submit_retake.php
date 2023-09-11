<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Leave it blank for no password
$dbname = "remark";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data and sanitize/validate as needed
    $student_name = isset($_POST["student_name"]) ? $_POST["student_name"] : "";
    $admission_number = isset($_POST["admission_number"]) ? $_POST["admission_number"] : "";
    $unit_for_retake = isset($_POST["unit_for_retake"]) ? $_POST["unit_for_retake"] : "";
    $student_email = isset($_POST["student_email"]) ? $_POST["student_email"] : "";
    $file_number = isset($_POST["file_number"]) ? $_POST["file_number"] : "";

    // Prepare the INSERT query with backticks around column names
    $sql = "INSERT INTO submitted_retake (`student_name`, `admission_number`, `unit_for_retake`, `student_email`, `file_number`)
            VALUES ('$student_name', '$admission_number', '$unit_for_retake', '$student_email', '$file_number')";

    // Execute the query
    if ($conn->query($sql) === true) {
        // Insertion successful, display a success message or redirect to a thank-you page
       echo '<script>alert("Retake submitted successfully."); window.location.href = "Retake form.php";</script>';

        // Add approved/rejected buttons here if needed
    } else {
        // Insertion failed, display an error message or handle the error accordingly
        echo '<script>alert("Retake not submitted successfully."); window.location.href = "Retake form.php";</script>';
    }
}

// Close the database connection
$conn->close();
?>
