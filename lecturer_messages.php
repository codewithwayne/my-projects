<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "login";

// Creating a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve messages sent by lecturers to administrators
$sql = "SELECT * FROM lecturer_messages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .message-list {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lecturer Messages to Administrators</h1>
        <nav>
            <ul>
                <li><a href="admin_module.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <div class="message-list">
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>File Number</th><th>Lecturer ID</th><th>Lecturer Email</th><th>Message</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['File_number'] . "</td>";
                echo "<td>" . $row['lecturer_id'] . "</td>";
                echo "<td>" . $row['lecturer_email'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No messages available.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
