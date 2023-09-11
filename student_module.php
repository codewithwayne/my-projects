<?php
session_start();

// Check if the student is logged in and the session is set
if (isset($_SESSION['student'])) {
    $studentInfo = $_SESSION['student'];
    $admissionNumber = $studentInfo['admission_number'];
    $course = $studentInfo['course'];
} else {
    // If the student is not logged in, redirect to the login page
    header("Location: student_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Remark and Retake System Students Website</title>
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
                <li><a href="student_profile.php">View Profile</a></li>
                <li><a href="student_logout.php">Logout</a></li> <!-- Add the logout link -->
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
            <ul>x
                <li>Exam 1: August 15, 2023</li>
                <li>Exam 2: August 22, 2023</li>
                <li>Exam 3: August 29, 2023</li>
            </ul>
        </div>
    </div>

    </div>
    <div class="application-forms">
        <h2>Application Forms</h2>
        <div class="application-links">
            <div>
                <h3>Application of exam remark</h3>
                <a href="Remark form.php">Link to exam remark application</a>
            </div>
            <div>
                <h3>Application of exam retake</h3>
                <a href="Retake form.php">Link to exam retake application</a>
            </div>
        </div>
    </div>

    <div class="communication-title-bar">
        <h3>Communication and Feedback</h3>
    </div>

    <!-- Chat With Lecturer/Admin Section -->
    <div class="chat-row">
        <h3>Chat With Lecturer/Admin</h3>
        <form class="chat-form" action="process_form.php" method="post">
            <div class="chatbox">
                <label for="contact-type">Select whom you want to message:</label>
                <select id="contact-type" name="contact-type" required>
                    <option value="" disabled selected> Select from here </option>
                    <option value="lecturer">Lecturer</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="text" id="student-name" name="student-name" placeholder="Enter your Name" required>
                <input type="text" id="admission-number" name="admission-number" placeholder="Enter your Admission Number" required>
                <input type="email" id="email" name="email" placeholder="Enter your Email ID" required>
                <label for="student-id">Type your message:</label>
                <textarea id="student-id" name="student-id" maxlength="1000" required></textarea>
                <div>Character limit is 1000</div>
                <button type="submit" class="email-submit">Submit</button>
            </div>
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
