<?php
// Start the session
session_start();


$_SESSION = array();

// Destroy the session
session_destroy();

// // display message logout successful after successfully logging out then redirecting to lecturer login page
echo '<script>alert("logout successful."); window.location.href = "lecturer_login.php";</script>';
exit();
?>
