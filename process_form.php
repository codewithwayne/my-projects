<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $contact_type = $_POST["contact-type"];
    $student_name = $_POST["student-name"];
    $admission_number = $_POST["admission-number"];
    $email = $_POST["email"];
    $message = $_POST["student-id"];

    // Database connection settings
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "login";

    // Create a new connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // To Prepare and execute the SQL query to insert the message into the database
    $sql = "INSERT INTO messages (contact_type, student_name, admission_number, email, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $contact_type, $student_name, $admission_number, $email, $message);
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // alert message to display message if successful submission
    echo '<script>alert("Message sent successfully."); window.location.href = "student_module.php";</script>';
    exit;
}
?>
