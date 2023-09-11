<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lecturerID = $_POST['lecturer-id'];
    $lecturerEmail = $_POST['lecturer-email'];
    $message = $_POST['message'];


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

    // Prepare and bind the data
    $stmt = $conn->prepare("INSERT INTO lecturer_messages (lecturer_id, lecturer_email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $lecturerID, $lecturerEmail, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // if success displays pop up message sent successfully
        echo '<script>alert("Message sent successfully."); window.location.href = "lecturer_module.php";</script>';
        exit();
    } else {
        // if not success displays pop up message not sent successfully
         echo '<script>alert("Message not sent successfully."); window.location.href = "lecturer_module.php";</script>';
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect to the lecturer_module page
     echo '<script>alert("Message not sent successfully."); window.location.href = "lecturer_module.php";</script>';
    exit();
}
?>
