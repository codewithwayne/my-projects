<?php
session_start();

// Check if the lecturer is logged in and the session is set
if (isset($_SESSION['lecturer'])) {
    $lecturerInfo = $_SESSION['lecturer'];
    $staffID = $lecturerInfo['lecturer_id'];
    $employmentStatus = isset($lecturerInfo['lecturer_type']) ? $lecturerInfo['lecturer_type'] : "Not available";
} else {
    // If the lecturer is not logged in, redirect to the login page
    header("Location: lecturer_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Remark and Retake System Lecturers Website</title>
    <link rel="stylesheet" href="lecturer.css">
</head>
<body>
    <header>
        <h1>Exam Remark and Retake System Lecturers Website</h1>
        <!-- Pop-out navigation bar -->
        <div class="nav-icon" onclick="toggleNav()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav id="popout-nav">
            <ul>
                <li><a href="lecturer_profile.php">View Profile</a></li>
                <li><a href="lecturer_logout.php">Logout</a></li> <!-- Add the logout link -->
            </ul>
        </nav>
    </header>

    <div class="teacher-info">
        <img class="logo" src="strath logo.png" alt="strath logo">
        <div class="teacher-details">
            <p>Staff Number: <?php echo $staffID; ?></p>
            <p>Employment Status: <?php echo $employmentStatus; ?></p>
        </div>
        <div class="exam-dates">
            <p>Exam Remark and Retake Deadline Dates:</p>
            <ul>
                <li>Date 1: August 15, 2023</li>
                <li>Date 2: August 22, 2023</li>
                <li>Date 3: August 29, 2023</li>
            </ul>
        </div>
    </div>

    <div class="remark-application-link">
        <h3 align="center">Approved Remark Application Link:</h3>
        
    </div>

    <!-- Remark Forms Box -->
    <div class="remark-forms-box">
        <h3>Remark Forms</h3>
        <a href="submission_remarks.php">View Appoved Remark Forms</a>
    </div>

    <div class="remark-forms-box">
        <h3>Messages from students</h3>

        <a href="student_message.php">View Messages Sent From The Students</a>
    </div>

    <!-- Chat With Lecturer/Admin Section -->
    <div class="chat-row">
        <h3>Send Message to Admin</h3>
        <form class="email-input" id="chat-form" action="lecturer_message.php" method="post">
            <div class="form-group">
                <label for="lecturer-id">Lecturer ID:</label>
                <input type="text" id="lecturer-id" name="lecturer-id" required>
            </div>

            <div class="form-group">
                <label for="lecturer-email">Lecturer Email:</label>
                <input type="email" id="lecturer-email" name="lecturer-email" required>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" maxlength="1000" required></textarea>
                <div>Character limit: 1000</div>
            </div>

            <div align="center"> <button  type="submit" class="email-submit" >Submit</button> </div>
        </form>
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
