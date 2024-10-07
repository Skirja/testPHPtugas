<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "user") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Selamat datang, <?php echo $_SESSION["username"]; ?>! (User)</h1>
        <p>Ini adalah dashboard user.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
