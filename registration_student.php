<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $admission_number = trim($_POST["admission_number"]);
    $student_name = trim($_POST["student_name"]);
    $course = trim($_POST["course"]);
    $password = $_POST["password"];

    // Validate form fields
    if (empty($admission_number) || empty($student_name) || empty($course) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Database connection settings
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "login";

    // Create a new connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the admission number already exists in the database
    $check_sql = "SELECT * FROM student_registration WHERE admission_number = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $admission_number);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "Admission number already exists.";
        exit;
    }

    // Hash the password before storing in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to insert the student data
    $sql = "INSERT INTO student_registration (admission_number, student_name, course, user_password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing the SQL query: " . $conn->error);
    }

    $stmt->bind_param("ssss", $admission_number, $student_name, $course, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful. You can now login.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
