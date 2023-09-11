<!-- lecturer_login.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Lecturer Login</title>
  <link rel="stylesheet" href="login_c.css">
</head>
<body>
  <div class="login-container">
    <h1>Lecturer Login</h1>
    <form id="login-form" method="post" action="login_lec.php">
      <label for="staff-id">Staff ID:</label>
      <input type="text" id="staff-id" name="staff-id" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login</button>
    </form>

    <div id="login-status">
      <?php
        if (isset($_GET["error"]) && $_GET["error"] === "1") {
            echo "Invalid staff ID or password. Please try again.";
        }
      ?>
    </div>
      <p>Don't have an account? <a href="lecturer_signup.php">Click here to sign up.</a></p>
        <p>Are you a Student? <a href="student_login.php">Click here to  go to the student login page</a></p>
        <p>Are you an Admin? <a href="admin_login.php">Click here to go to the admin login page.</a></p>
  </div>
</body>
</html>
