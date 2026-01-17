<?php
// NO session_start() here — dashboard already started it

require_once __DIR__ . '/../configs/db.php';

$balance = 0.00;

if (!isset($_SESSION['user_id'])) {
    return;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT balance FROM accounts WHERE user_id = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $balance = (float)$row['balance'];
    }

    mysqli_stmt_close($stmt);
}