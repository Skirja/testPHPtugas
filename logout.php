<?php
session_start();
session_unset();
session_destroy();

// Set a flash message to display on the login page
$_SESSION['logout_message'] = "Anda telah berhasil logout.";

header("Location: login.php");
exit;
?>
