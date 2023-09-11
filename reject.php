<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reject Retake Form</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <nav>
        <ul>
            <a href="admin_module.php">Home Page</a>
        </ul>
    </nav>
    <div class="container">
        <h1>Reject Retake Form</h1>
        <?php
        if (isset($_GET['file_number'])) {
            $file_number = $_GET['file_number'];
            echo "<p>File Number: $file_number</p>";
            echo "<p>Status: Rejected</p>";
        } else {
            echo "<p>No file number provided.</p>";
        }
        ?>
    </div>
</body>
</html>
