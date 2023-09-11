<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
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
</head>
<body>
    <h1>Student Details</h1>
    <table align="center">
        <tr>
            <th>File Number</th>
            <th>Admission Number</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Password</th>
        </tr>
        <?php
        // Database configuration
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

        // Retrieve student details from the database
        $sql = "SELECT * FROM student_registration";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display student details
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['File_number'] . "</td>";
                echo "<td>" . $row['admission_number'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['user_password'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No student details available.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
