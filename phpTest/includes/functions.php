<?php
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function escapeSQL($conn, $data) {
    return mysqli_real_escape_string($conn, $data);
}

function validateUsername($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows == 0;
}
?>
