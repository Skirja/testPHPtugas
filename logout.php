<?php
session_start();
session_unset();
session_destroy();

echo "<p>DEBUG: Session destroyed in logout.php. Session ID: " . session_id() . "</p>";
// Removed the debug echo, redirecting now.
header("Location: login.php"); 
exit();
?>
