<?php

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

// Function to perform secure password hashing 
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $admission_number = $_POST["admission_number"];
    $user_password = $_POST["user_password"];



    // Prepare the SQL query using a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM student_registration WHERE admission_number = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admission_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password using password_verify function
        if (password_verify($user_password, $row['user_password'])) {
            // Login successful, store relevant student details in the session
            session_start();
            $_SESSION['student'] = array(
                'student_name' => $row['student_name'],
                'admission_number' => $row['admission_number'],
                'course' => $row['course']
               
            );
            header("Location: student_module.php");
            exit();
        } else {
            // Login failed, incorrect password
           echo '<script>alert("Password is incorrect. Please type a different password."); window.location.href = "student_login.php";</script>';
        }
    } else {
        // Login failed, Admission number not found
        echo '<script>alert("Admission number is incorrect. Please type a different admission number."); window.location.href = "student_login.php";</script>';
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
