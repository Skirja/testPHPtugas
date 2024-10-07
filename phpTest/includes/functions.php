<?php
function sanitizeInput($data) {
    //This function is now largely redundant due to prepared statements.  Consider removing it.
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function validateUsername($username, $conn) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows == 0;
}
?>
