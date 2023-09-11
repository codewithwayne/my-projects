<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submitted Retake Forms</title>
    <!-- Add your CSS styles here or link to an external CSS file -->
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <nav>
        <ul>
            <a href="admin_module.php">Home Page</a>
        </ul>
    </nav>
    <div class="container">
        <h1>Submitted Retake Forms</h1>
        <table>
            <tr>
                <th>File Number</th>
                <th>Student Name</th>
                <th>Admission Number</th>
                <th>Unit for Retake</th>
                <th>Student Email</th>
                <th>Action</th>
            </tr>
            <?php
            // Database configuration
            $servername = "localhost";
            $username = "root";
            $password = ""; // Leave it blank for no password
            $dbname = "remark";

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Process "Approve" or "Reject" action
            if (isset($_GET["action"]) && isset($_GET["file_number"])) {
                $fileNumber = $_GET["file_number"];
                $action = $_GET["action"];
                
                // Update the database with the approval/rejection status
                $sqlUpdate = "UPDATE submitted_retake SET status = '$action' WHERE file_number = '$fileNumber'";
                if ($conn->query($sqlUpdate) === TRUE) {
                    // Success, you can display the updated status
                }
            }

            // Retrieve data from the submitted_retake table
            $sql = "SELECT * FROM submitted_retake";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["File_number"] . "</td>";
                    echo "<td>" . $row["student_name"] . "</td>";
                    echo "<td>" . $row["admission_number"] . "</td>";
                    echo "<td>" . $row["unit_for_retake"] . "</td>";
                    echo "<td>" . $row["student_email"] . "</td>";
                    echo "<td>";
                    if ($row["status"] === "") {
                        echo "<a href='?action=approve&file_number=" . $row["File_number"] . "'>Approve</a> | ";
                        echo "<a href='?action=reject&file_number=" . $row["File_number"] . "'>Reject</a>";
                    } elseif ($row["status"] === "approve") {
                        echo "Approved";
                    } elseif ($row["status"] === "reject") {
                        echo "Rejected";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No retake forms submitted yet.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
