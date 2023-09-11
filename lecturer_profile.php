<?php
session_start();

// to check if the lecturer is logged in and the session is set
if (isset($_SESSION['lecturer'])) {
    $lecturerInfo = $_SESSION['lecturer'];
    $lecturerID = $lecturerInfo['lecturer_id'];
    $lecturerName = $lecturerInfo['lecturer_name'];
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
    <title>Lecturer Profile</title>
    <link rel="stylesheet" href="lecturer_profile.css">
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
                <li><a href="lecturer_module.php">Home page</a></li>
                <li><a href="lecturer_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

        <div class="lecturer-details">
            <p>Lecturer ID: <?php echo $lecturerID; ?></p>
            <p>Lecturer Name: <?php echo $lecturerName; ?></p>
        </div>
    </div>

    <!-- Display all lecturer details from the database -->
    <div class="lecturer-profile">
        <h2>Lecturer Profile</h2>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "login";

        // Creatng a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Checking the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // get  all lecturer details from the database
        $sql = "SELECT * FROM lecturer_registration WHERE lecturer_id = '$lecturerID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display lecturer details
            $lecturerData = $result->fetch_assoc();
            echo "<p>Email: " . $lecturerData['lecturer_email'] . "</p>";
            echo "<p>Lecturer Type: " . $lecturerData['lecturer_type'] . "</p>";
            echo "<p>Password: <input type='password' id='password' value='" . $lecturerData['lecturer_password'] . "' readonly>";
            echo "<button onclick='togglePassword()'>Show/Hide Password</button></p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <!-- Add an "Edit Profile" link to allow lecturers to edit their details -->
    <div class="edit-profile">
        <a href="lecturer_edit.php">Edit Profile</a>
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
