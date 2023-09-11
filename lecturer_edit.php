<?php
session_start();

// Check if the lecturer is logged in and the session is set
if (!isset($_SESSION['lecturer'])) {
    // If the lecturer is not logged in, redirect to the login page
    header("Location: lecturer_login.php");
    exit();
}


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

// Retrieve the lecturer's details from the database
$lecturerID = $_SESSION['lecturer']['lecturer_id'];
$sql = "SELECT * FROM lecturer_registration WHERE lecturer_id = '$lecturerID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the lecturer's data as an associative array
    $lecturerData = $result->fetch_assoc();
} else {
    // If the lecturer's data is not found, display an error message
    die("Lecturer data not available.");
}

// Update the lecturer's details in the database if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $lecturerName = $_POST['lecturer_name'];
    $lecturerEmail = $_POST['lecturer_email'];
    $newPassword = $_POST['new_password'];

    // Hash the new password before storing it in the database
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the lecturer's details in the database
    $sqlUpdate = "UPDATE lecturer_registration SET lecturer_name = '$lecturerName', lecturer_email = '$lecturerEmail', lecturer_password = '$hashedPassword' WHERE lecturer_id = '$lecturerID'";

    if ($conn->query($sqlUpdate) === TRUE) {
        // If the update is successful, redirect to the lecturer_profile.php page
        header("Location: lecturer_profile.php");
        exit();
    } else {
        // If there is an error in the update, display an error message
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lecturer Profile</title>
    <link rel="stylesheet" href="lecturer_edit.css">
</head>
<body>
    <header>
        <h1>Edit Lecturer Profile</h1>
    </header>

    <div class="edit-form">
        <form method="post" action="#">
            <div class="form-group">
                <label for="lecturer_name">Lecturer Name:</label>
                <input type="text" id="lecturer_name" name="lecturer_name" value="<?php echo $lecturerData['lecturer_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="lecturer_email">Lecturer Email:</label>
                <input type="email" id="lecturer_email" name="lecturer_email" value="<?php echo $lecturerData['lecturer_email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>

            <div class="form-group">
                <button type="submit" name="submit">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
