<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Approved Remark Applications</title>
    <!-- Add your CSS styles here or link to an external CSS file -->
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <nav>
        <ul>
            <a href="lecturer_module.php">Home Page</a>
        </ul>
    </nav>
    <div class="container">
        <h1>Approved Remark Applications</h1>
        <table>
            <tr>
                <th>File Number</th>
                <th>Student Name</th>
                <th>Admission Number</th>
                <th>Unit for Remark</th>
                <th>Remark Reason</th>
                <th>Student Email</th>
            </tr>
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "remark";

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve approved remarks from the database
            $sql = "SELECT * FROM submitted_remarks WHERE status = 'approve'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row in a table row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["File_number"] . "</td>";
                    echo "<td>" . $row["student_name"] . "</td>";
                    echo "<td>" . $row["admission_number"] . "</td>";
                    echo "<td>" . $row["unit_for_remark"] . "</td>";
                    echo "<td>" . $row["remark_reason"] . "</td>";
                    echo "<td>" . $row["student_email"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No approved remark applications submitted yet.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
