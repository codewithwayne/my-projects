
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="login_a.css">
</head>
<body>
  <div class="login-container">
    <h1>Admin Login</h1>
    <form action="login_admin.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>


      <button type="submit">Login</button>
    </form>
    <div id="login-status"></div>
     <p>Are you a Student? <a href="student_login.php">Click here to  go to the student login page</a></p>
        <p>Are you an Lecturer? <a href="lecturer_login.php">Click here to go to the lecturer login page.</a></p>

  </div>
 
  <script src="admin.js"></script>
</body>
</html>
