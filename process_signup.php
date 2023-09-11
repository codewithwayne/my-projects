<?php
// to check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $lecturerName = $_POST["lecturer-name"];
    $lecturerID = $_POST["lecturer-id"];
    $lecturerEmail = $_POST["lecturer-email"];
    $lecturerPassword = $_POST["lecturer-password"]; // The plain text password entered by the user
    $lecturerType = $_POST["lecturer-type"];

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

    // Check if a lecturer with the same ID or email already exists in the database
    $checkQuery = "SELECT * FROM lecturer_registration WHERE lecturer_id = '$lecturerID' OR lecturer_email = '$lecturerEmail'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // if Lecturer with the same ID already exists, alert message
        echo '<script> alert("Lecturer Id already exists. Please use a different Lecturer Id ."); window.location.href = "lecturer_signup.php"; </script>';
    } else {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($lecturerPassword, PASSWORD_DEFAULT);

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO lecturer_registration (lecturer_name, lecturer_id, lecturer_email, lecturer_password, lecturer_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $lecturerName, $lecturerID, $lecturerEmail, $hashedPassword, $lecturerType);

        // Execute the SQL statement
        if ($stmt->execute()) {
            // Registration successful,alert signup successful then redirect to the login page
            echo '<script>alert("Signup successful."); window.location.href = "lecturer_login.php";</script>';
            exit();
        } else {
             // Registration not successful,alert signup not successful then redirect to the signup page
             echo '<script>alert("Signup not successful try again"); window.location.href = "lecture_signup.php";</script>';
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
}
?>
