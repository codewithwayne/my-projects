<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $lecturerName = $_POST["lecturer-name"];
    $lecturerID = $_POST["lecturer-id"];
    $lecturerEmail = $_POST["lecturer-email"];
    $lecturerPassword = $_POST["lecturer-password"];
    $lecturerType = $_POST["lecturer-type"];

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

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO lecturer_registration (lecturer_name, lecturer_id, lecturer_email, lecturer_password, lecturer_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $lecturerName, $lecturerID, $lecturerEmail, $lecturerPassword, $lecturerType);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Registration successful, redirect to a success page or login page
        header("Location: lecturer_login.php");
        exit();
    } else {
        // Registration failed, handle the error (you can redirect to an error page)
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Signup</title>
    <link rel="stylesheet" href="lecturer_signup.css">
</head>
<body>
    <div class="signup-form">
        <h2>Lecturer Signup</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="lecturer-name">Lecturer Name:</label>
                <input type="text" id="lecturer-name" name="lecturer-name" required>
            </div>

            <div class="form-group">
                <label for="lecturer-id">Lecturer ID:</label>
                <input type="text" id="lecturer-id" name="lecturer-id" required>
            </div>

            <div class="form-group">
                <label for="lecturer-email">Lecturer Email:</label>
                <input type="email" id="lecturer-email" name="lecturer-email" required>
            </div>

            <div class="form-group">
                <label for="lecturer-password">Lecturer Password:</label>
                <input type="password" id="lecturer-password" name="lecturer-password" required>
            </div>

            <div class="form-group">
                <label for="lecturer-type">Lecturer Type:</label>
                <select id="lecturer-type" name="lecturer-type" required>
                    <option value="" disabled selected>Select Lecturer Type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </div>

            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
