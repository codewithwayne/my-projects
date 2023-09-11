<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Signup</title>
    <link rel="stylesheet" href="lecturer_signup.css">
</head>
<body>
    <div class="signup-form">
        <h2>Lecturer Signup</h2>
        <form action="process_signup.php" method="post">
            <div class="form-group">
                <label for="lecturer-name">Lecturer Name:</label>
                <input type="text" id="lecturer-name" name="lecturer-name" required>
            </div>

            <div class="form-group">
                <label for="lecturer-id">Lecturer ID:</label>
                <input type="text" id="lecturer-id" name="lecturer-id" required>
            </div>

            <div class="form-group">
                <label for="lecturer-email">Lecturer Email:</label>
                <input type="email" id="lecturer-email" name="lecturer-email" required>
            </div>

            <div class="form-group">
                <label for="lecturer-password">Password:</label>
                <input type="password" id="lecturer-password" name="lecturer-password" required>
            </div>

            <div class="form-group">
                <label for="lecturer-type">Lecturer Type:</label>
                <select id="lecturer-type" name="lecturer-type" required>
                    <option value="" disabled selected>Choose Type</option>
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                </select>
            </div>

            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
