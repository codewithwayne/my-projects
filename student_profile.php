<?php
session_start();

// Check if the student is logged in and the session is set
if (isset($_SESSION['student'])) {
    $studentInfo = $_SESSION['student'];
    $admissionNumber = $studentInfo['admission_number'];
    $course = $studentInfo['course'];
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
    <title>Student Profile</title>
    <link rel="stylesheet" href="student_module.css">
</head>
<body>
    <header>
        <h1>Exam Remark and Retake System Students Website</h1>
        <!-- Pop-out navigation bar -->
        <div class="nav-icon" onclick="toggleNav()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav id="popout-nav">
            <ul>
                <li><a href="student_module.php">Home page</a></li>
                <li><a href="student_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="student-info">
        <img class="logo" src="strath logo.png" alt="strath logo">
        <div class="student-details">
            <p>Admission Number: <?php echo $admissionNumber; ?></p>
            <p>Course: <?php echo $course; ?></p>
        </div>
        <div class="exam-dates">
            <p>Exam Submission Dates:</p>
            <ul>
                <li>Exam 1: August 15, 2023</li>
                <li>Exam 2: August 22, 2023</li>
                <li>Exam 3: August 29, 2023</li>
            </ul>
        </div>
    </div>

    <!-- Display all student details from the database -->
    <div class="student-profile">
        <h2>Student Profile</h2>
        <?php
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

        // Retrieve all student details from the database
        $sql = "SELECT * FROM student_registration WHERE admission_number = '$admissionNumber'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display student details
            $studentData = $result->fetch_assoc();
            echo "<p>Name: " . $studentData['student_name'] . "</p>";
            echo "<p>Admission Number: " . $studentData['admission_number'] . "</p>";
            echo "<p>Course: " . $studentData['course'] . "</p>";
            echo "<p>Password: <input type='password' id='password' value='" . $studentData['user_password'] . "' readonly>";
            echo "<button onclick='togglePassword()'>show/hide password</button></p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>


    <div class="edit-profile">
        <a href="student_edit.php">Edit Profile</a>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            var passwordElement = document.getElementById("password");
            if (passwordElement.getAttribute('type') === "password") {
                passwordElement.setAttribute('type', 'text');
            } else {
                passwordElement.setAttribute('type', 'password');
            }
        }

        // Toggle pop-out navigation bar
        function toggleNav() {
            var nav = document.getElementById("popout-nav");
            if (nav.style.display === "block") {
                nav.style.display = "none";
            } else {
                nav.style.display = "block";
            }
        }
    </script>
</body>
</html>
