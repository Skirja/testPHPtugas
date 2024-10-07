<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = ""; // Ganti dengan password MySQL Anda
$db_name = "phpTest_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
