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

// Query to retrieve all lecturer details
$sql = "SELECT * FROM lecturer_registration";
$result = $conn->query($sql);

// Check if the delete button is clicked
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
    $deleteLecturerID = $_POST['delete'];

    // Delete the record from lecturer_registration table
    $deleteQuery = "DELETE FROM lecturer_registration WHERE lecturer_id = '$deleteLecturerID'";
    if ($conn->query($deleteQuery)) {
        // After successful deletion, refresh the page
        header("Location: lecturer_details.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Details</title>
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
    <h1>Lecturer Details</h1>
    <table>
        <tr>
            <th>File Number</th>
            <th>Lecturer Name</th>
            <th>Lecturer ID</th>
            <th>Lecturer Email</th>
            <th>Password</th>
            <th>Lecturer Type</th>
            <th>Actions</th>
        </tr>
        <?php
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["File_number"] . "</td>";
            echo "<td>" . $row["lecturer_name"] . "</td>";
            echo "<td>" . $row["lecturer_id"] . "</td>";
            echo "<td>" . $row["lecturer_email"] . "</td>";
            echo "<td>" . $row["lecturer_password"] . "</td>";
            echo "<td>" . $row["lecturer_type"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <button type='submit' name='delete' value='" . $row['lecturer_id'] . "'>Delete</button>
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
