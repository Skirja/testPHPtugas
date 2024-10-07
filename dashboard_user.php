<?php
// ... kode Anda yang sudah ada ...

// Tambahkan kode ini di tempat yang Anda inginkan tombol logout muncul
?>
<form action="logout.php" method="post">
    <button type="submit">Logout</button>
</form>

<?php if(isset($_SESSION['username'])): ?>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
<?php endif; ?>

<?php
// ... sisa kode Anda ...
?>
