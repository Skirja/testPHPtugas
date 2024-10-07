<?php
session_start();
session_unset();
session_destroy();

// More secure redirection using a relative path
header("Location: login.php"); 
//Alternative, if login.php is in a different location, use a full URL:
//header("Location: https://yourdomain.com/login.php");

//Optional: Add a message to confirm logout.  This requires a small change to the HTML.
//echo "<script>alert('You have been logged out.');</script>";

exit;
?>
