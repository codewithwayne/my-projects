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
    $file_number = isset($_POST["file_number"]) ? $_POST["file_number"] : "";
    $student_name = isset($_POST["student_name"]) ? $_POST["student_name"] : "";
    $admission_number = isset($_POST["admission_number"]) ? $_POST["admission_number"] : "";
    $unit_for_remark = isset($_POST["unit_for_remark"]) ? $_POST["unit_for_remark"] : "";
    $remark_reason = isset($_POST["remark_reason"]) ? $_POST["remark_reason"] : "";
    $student_email = isset($_POST["student_email"]) ? $_POST["student_email"] : "";

    // Prepare and bind the INSERT query with placeholders
    $stmt = $conn->prepare("INSERT INTO submitted_remarks (file_number, student_name, admission_number, unit_for_remark, remark_reason, student_email)
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $file_number, $student_name, $admission_number, $unit_for_remark, $remark_reason, $student_email);

    // Execute the query
    if ($stmt->execute()) {
        // Insertion successful, display a success message or redirect to a thank-you page
       echo '<script>alert("Remark submitted successfully."); window.location.href = "Remark form.php";</script>';

        // Add approved/rejected buttons here if needed
    } else {
        // Insertion failed, display an error message or handle the error accordingly
        echo '<script>alert("Remark not submitted successfully."); window.location.href = "Remark form.php";</script>';
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
