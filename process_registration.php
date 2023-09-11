<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . $mysqli_connect_error());
} else {
    // Display a message for successful connection
    echo "Database connection successful!<br>";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $student_name = $_POST["student-name"];
        $admission_number = $_POST["admission-number"];
        $course = $_POST["course"];
        $user_password = $_POST["user-password"];

        // Hash the user password
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        // Check if the admission number already exists in the database
        $check_sql = "SELECT * FROM student_registration WHERE admission_number = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $admission_number);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            // Admission number already exists, display a pop-up alert
            echo '<script>alert("Admission number already exists. Please type a different admission number."); window.location.href = "student_registration.php";</script>';
        } else {
            // Prepare and execute the SQL query to insert the data into the database
            $sql = "INSERT INTO student_registration (student_name, admission_number, course, user_password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $student_name, $admission_number, $course, $hashed_password);
            $stmt->execute();

            // Close the statements and connection
            $stmt->close();
            $check_stmt->close();
            $conn->close();

            // alert if signup successful page
            echo '<script>alert("signup successful."); window.location.href = "student_login.php";</script>';
            exit;
        }
    }
}
?>
