<?php
// to start the session
session_start();

// To check if the admin is logged in and the session is set
if (isset($_SESSION['admin'])) {
    $adminInfo = $_SESSION['admin'];
    $adminNumber = $adminInfo['admin_number'];
} else {
    // If the admin is not logged in, redirect to the admin login page
    header("Location: admin_login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Remark and Retake System administrators Website</title>
    <link rel="stylesheet" href="student_module.css">
</head>
<body>
    <header>
        <h1>Exam Remark and Retake System administrators Website</h1>
        <!-- The pop-out navigation bar -->
        <div class="nav-icon" onclick="toggleNav()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav id="popout-nav">
            <ul>
                <li><a href="admin_module.php">Home</a></li>
                <li><a href="admin_logout.php">Logout</a></li> <!-- Add the logout link -->
            </ul>
        </nav>
    </header>

    <div class="student-info">
        <img class="logo" src="strath logo.png" alt="strath logo">
        <div class="student-details">
            <p>Admin Number: <?php echo $adminNumber; ?></p>
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


    <div class="application-forms">
        <h2>Submission Forms</h2>
        <div class="application-links">
            <div>
                <h3>Sumbissions of exam remark</h3>
                <a href="view_submitted_remark.php">Link to exam remark application</a>
            </div>
            <div>
                <h3>Sumbissions of exam retake</h3>
                <a href="view_submitted_retake.php">Link to exam retake application</a>
            </div>
        </div>
    </div>

    <div class="communication-title-bar">
        <h3>Mesages received</h3>
    </div>
    <div class="application-links">
        <div>
            <h3>Student messages</h3>
            <a href="student_messages.php">Link to Student messages</a>
        </div>
        <div>
            <h3>Lecturer Messages</h3>
            <a href="lecturer_messages.php">Link to lecturer messages</a>
        </div>
    </div>
     <div class="application-forms">
        <h2>All the users</h2>
        <div class="application-links">
            <div>
                <h3>All the students</h3>
                <a href="student_details.php">Link to the all students registered</a>
            </div>
            <div>
                <h3>All the lecturers</h3>
                <a href="lecturer_details.php">Link to the all lecturers registered</a>
            </div>
        </div>
    </div>

    
    <script>
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
