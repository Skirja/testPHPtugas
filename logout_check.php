<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "DEBUG: Still logged in according to logout_check.php. Session ID: " . session_id();
} else {
    echo "DEBUG: Logged out according to logout_check.php.";
}
?>
