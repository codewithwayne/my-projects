<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Remark Request</title>
    <!-- Add your CSS styles here or link to an external CSS file -->
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
        <a href="student_module.php">Go to Student Module</a> <!-- Add this line to create a link -->
        <h1>Exam Remark Request</h1>
        
        <form action="submit_remark.php" method="POST">

            <div class="form-group">
                <label for="student_name">Name of the Student:</label>
                <input type="text" id="student_name" name="student_name" required>
            </div>

            <div class="form-group">
                <label for="admission_number">Student Admission Number:</label>
                <input type="text" id="admission_number" name="admission_number" required>
            </div>

            <div class="form-group">
                <label for="unit_for_remark">Unit for Remark:</label>
                <input type="text" id="unit_for_remark" name="unit_for_remark" required>
            </div>

            <div class="form-group">
                <label for="remark_reason">Reason for Remark:</label>
                <input type="text" id="remark_reason" name="remark_reason" required>
            </div>

            <div class="form-group">
                <label for="student_email">Student Email:</label>
                <input type="email" id="student_email" name="student_email" required>
            </div>

            <input type="submit" value="Submit Request">
        </form>
    </div>
</body>
</html>
