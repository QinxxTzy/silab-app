<?php
require_once __DIR__ . '/../config/database.php';

function loginUser($username, $password) {
    global $conn;
    
    // Ubah input password menjadi hash MD5
    $password_md5 = md5($password);
    
    // Gunakan prepared statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password_md5);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($user = mysqli_fetch_assoc($result)) {
        // Jika data ditemukan, berarti username & password cocok
        return $user;
    }
    
    return false;
}
?>