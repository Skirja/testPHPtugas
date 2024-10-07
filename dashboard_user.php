<?php
session_start();
include 'includes/config.php';
include 'includes/functions.php';

if (!isset($_SESSION["user_id"])) {
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
        <?php echo "<p>DEBUG: Session ID on dashboard: " . session_id() . "</p>"; ?>
        <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <p id="logout_message"></p>
        <button onclick="showSnakeGame()">Mainkan Snake</button>

        <iframe id="snakeGameFrame" src="" style="display:none; width:400px; height:400px;"></iframe>

        <script>
            function showSnakeGame() {
                document.getElementById('snakeGameFrame').src = 'snake.html';
                document.getElementById('snakeGameFrame').style.display = 'block';
            }
            document.addEventListener('DOMContentLoaded', function() {
                fetch('logout_check.php')
                    .then(response => response.text())
                    .then(message => {
                        document.getElementById('logout_message').textContent = message;
                    });
            });
        </script>
    </div>
</body>
</html>

