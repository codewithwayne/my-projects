<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <div class="container">
        <link rel="stylesheet" href="form.css">
        <a href="student_module.php">Go to Student Module</a> <!-- Add this line to create a link -->
        <h1>Retake Request</h1>
        <form action="submit_retake.php" method="POST">
            <div class="form-group">
                <label for="student_name">Name of the Student:</label>
                <input type="text" id="student_name" name="student_name" required>
            </div>

            <div class="form-group">
                <label for="admission_number">Student Admission Number:</label>
                <input type="text" id="admission_number" name="admission_number" required>
            </div>

            <div class="form-group">
                <label for="unit_for_remark">Unit for Retake:</label>
                <input type="text" id="unit_for_retake" name="unit_for_retake" required>
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
