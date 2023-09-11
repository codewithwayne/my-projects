<?php
session_start();

// Check if the student is logged in and the session is set
if (isset($_SESSION['student'])) {
    $studentInfo = $_SESSION['student'];
    $admissionNumber = $studentInfo['admission_number'];

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

    // Retrieve student data from the database
    $sql = "SELECT * FROM student_registration WHERE admission_number = '$admissionNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the student details
        $studentData = $result->fetch_assoc();
    } else {
        // If the student data is not found
        echo "Student data not found.";
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    // If the student is not logged in, redirect to the login page
    header("Location: login_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <header>
        <h1>Exam Remark and Retake System Students Website</h1>
        <!-- Pop-out navigation bar -->
    </header>

    <div class="edit-profile-form">
        <h2>Edit Profile</h2>
        <form action="update_profile.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $studentData['student_name']; ?>" required>

            <label for="course">Course:</label>
            <input type="text" id="course" name="course" value="<?php echo $studentData['course']; ?>" required>

            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new-password" required>
            
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
