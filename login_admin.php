<?php
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];


    // Query to check if the admin username and password are correct
    $sql = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Login successful, retrieve admin number and redirect to admin_module.php
        $adminData = $result->fetch_assoc();
        $adminNumber = $adminData['admin_number'];

        // Start the session and store admin number
        session_start();
        $_SESSION['admin'] = ['admin_number' => $adminNumber];

        header("Location: admin_module.php");
        exit();
    } else {
        // Login failed
        echo "Invalid username or password. Please try again.";
    }
}

$conn->close();
?>
