<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <!-- Student Registration Form -->
    <div class="registration-container">
        <h2 class="registration-title">Student Registration</h2>
        <form class="registration-form" action="process_registration.php" method="POST">
            <div class="form-group">
                <label for="student-name">Student Name:</label>
                <input type="text" id="student-name" name="student-name" required>
            </div>
            <div class="form-group">
                <label for="admission-number">Admission Number:</label>
                <input type="text" id="admission-number" name="admission-number" required>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" id="course" name="course" required>
            </div>
            <div class="form-group">
                <label for="user-password">Password:</label>
                <input type="password" id="user-password" name="user-password" required>
            </div>
            <button type="submit" class="registration-submit">Register</button>
        </form>
        <p>Back to student login page<a href="student_module.php">Click here to go back.</a></p>
    </div>


</body>
</html>
