<?php
//Example using environment variables.  Adapt to your environment.
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: ''; // Replace with a more secure method in production
$db_name = getenv('DB_NAME') ?: 'phpTest_db';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
