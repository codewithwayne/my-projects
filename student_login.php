<?php
session_start();

// If the student is already logged in, redirect to student_module.php
if (isset($_SESSION['student'])) {
    header("Location: student_module.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate login credentials (replace with your validation logic)
    $username = "your_username";
    $password = "your_password";

    if ($_POST["username"] === $username && $_POST["password"] === $password) {
        // Valid credentials, set session and redirect to student_module.php
        $_SESSION["student"] = array(
            "admission_number" => "your_admission_number",
            "course" => "your_course"
        );
        header("Location: student_module.php");
        exit();
    } else {
        echo '<script>alert("Password is incorrect. Please type a different password."); window.location.href = "student_login.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <!-- Add the appropriate CSS file for styling -->
    <link rel="stylesheet" href="login_b.css">
</head>
<body>
    <div class="login-container">
        <h2>Student Login</h2>
        <form action="login_student.php" method="post">
            <label for="admission-number">Admission Number:</label>
            <!-- Add a pattern attribute if there's a specific format for admission numbers -->
            <input type="text" id="admission-number" name="admission_number" required>
            <label for="password">Password:</label>
            <input type="password" id="user_password" name="user_password" required>
            <!-- Use appropriate button type to submit the form -->
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="student_registration.php">Click here to sign up.</a></p>
        <p>Are you a lecturer? <a href="lecturer_login.php">Click here to  go to the lecturer login page</a></p>
        <p>Are you an admin? <a href="admin_login.php">Click here to go to the admin login page.</a></p>
    </div>
</body>
</html>

