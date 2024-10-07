<?php
function validateUsername($username, $conn) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    if (!$stmt) {
        error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        return false; // Or throw an exception
    }
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        $stmt->close();
        return false; // Or throw an exception
    }
    $stmt->store_result();
    $stmt->close();
    return $stmt->num_rows == 0;
}

function escapeSQL($conn, $data) {
    return mysqli_real_escape_string($conn, $data);
}
?>
