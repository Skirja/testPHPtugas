<?php
// ... kode Anda yang sudah ada ...

session_start(); // Pastikan sesi dimulai

if (isset($_SESSION['username'])) {
    ?>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <form action="logout.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <?php
} else {
    // Redirect ke halaman login jika pengguna belum login
    header("Location: login.php");
    exit;
}

// ... sisa kode Anda ...
?>
