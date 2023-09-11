<?php
session_start();

// Clear the session
session_unset();
session_destroy();

// Redirect to the login page
echo '<script>alert("logout successful."); window.location.href = "student_login.php";</script>';
exit();
?>
