<?php
session_start();
include 'includes/config.php';
include 'includes/functions.php';

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Input validation
    if (empty($username) || empty($password)) {
        $error = "Username and password are required.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Regenerate session ID for added security
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard_user.php");
                exit;
            } else {
                $error = "Invalid username or password.";
                // Log failed login attempt (for security auditing)
                error_log("Failed login attempt: username=" . $username . ", IP=" . $_SERVER['REMOTE_ADDR']);
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
            // Log database error
            error_log("Database error: " . $e->getMessage());
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
