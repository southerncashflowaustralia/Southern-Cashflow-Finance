<?php
session_start();
require_once "../config/db.php";

/* 🔐 PROTECT DASHBOARD */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

/* 💰 GET USER BALANCE */
$sql = "SELECT balance FROM accounts WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$balance = 0.00;
if ($row = $result->fetch_assoc()) {
    $balance = $row['balance'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            width: 320px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .balance {
            background: #1769ff;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        a {
            display: inline-block;
            margin: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .deposit { color: green; }
        .withdraw { color: orange; }
        .logout { color: red; }
    </style>
</head>
<body>

<div class="card">
    <h2>Welcome, <?= htmlspecialchars($user_name); ?></h2>

    <div class="balance">
        <strong>Account Balance</strong><br>
        $<?= number_format($balance, 2); ?>
    </div>

    <a href="deposit.php" class="deposit">Deposit</a>
    <a href="withdraw.php" class="withdraw">Withdraw</a><br><br>
    <a href="logout.php" class="logout">Logout</a>
</div>

</body>
</html>