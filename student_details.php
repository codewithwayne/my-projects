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

// Query to retrieve all student details
$sql = "SELECT * FROM student_registration";
$result = $conn->query($sql);

// what to do when delete button is clicked
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
    $deleteFileNumber = $_POST['delete'];

    // Delete the record from student_registration table
    $deleteQuery = "DELETE FROM student_registration WHERE File_number = '$deleteFileNumber'";
    if ($conn->query($deleteQuery)) {
        // Successful deletion, refresh the page
        header("Location: student_details.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <a href="admin_module.php">Back to Home</a>
    <style>
          <style>
          body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
}

h1 {
    text-align: center;
    margin-top: 10px;
    margin-bottom: 20px;
    color: #333;
}



th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    background-color: #f2f2f2;
    color: #333;
}

td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
</style>
    </style>
</head>
<body>
    <h1>Student Details</h1>
    <table>
        <tr>
            <th>File Number</th>
            <th>Admission Number</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <?php
        // Looping through the query result and display each student's details in a row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["File_number"] . "</td>";
            echo "<td>" . $row["admission_number"] . "</td>";
            echo "<td>" . $row["student_name"] . "</td>";
            echo "<td>" . $row["course"] . "</td>";
            echo "<td>" . $row["user_password"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <button type='submit' name='delete' value='" . $row['File_number'] . "'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
