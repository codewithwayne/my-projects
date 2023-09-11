<?php
session_start();

if (isset($_SESSION['student'])) {
    $studentInfo = $_SESSION['student'];
    $admissionNumber = $studentInfo['admission_number'];

    $servername = "localhost";
    $username = "root";
    $password = ""; // Leave the password blank
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data from the POST request
    $name = $_POST['name'];
    $course = $_POST['course'];
    $newPassword = $_POST['new-password'];

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update student data in the database
    $sql = "UPDATE student_registration SET student_name='$name', course='$course', user_password='$hashedPassword' WHERE admission_number='$admissionNumber'";

    if ($conn->query($sql) === TRUE) {
        // Update successful, redirect to student_profile.php
        header("Location: student_profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: login_page.php");
    exit();
}
?>
