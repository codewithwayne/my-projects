<?php
// Start the session
session_start();

$_SESSION = array();

// Destroy the session
session_destroy();

// display message logout successful after successfully logging out then redirecting to amin login page
echo '<script>alert("logout successful."); window.location.href = "admin_login.php";</script>';
exit();
?>
