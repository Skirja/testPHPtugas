<?php
session_start();
session_unset(); // Lebih baik daripada session_destroy() jika Anda hanya ingin menghapus variabel sesi
session_destroy();
header("Location: login.php");
exit;
?>
