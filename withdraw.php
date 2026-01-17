<?php
session_start();
require_once "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = floatval($_POST['amount']);
    if ($amount > 0 && $amount <= $_SESSION['balance']) {
        $_SESSION['balance'] -= $amount;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Withdraw</title>
</head>
<body>

<h2>Withdraw Money</h2>

<form method="post">
    <input type="number" step="0.01" name="amount" required>
    <button type="submit">Withdraw</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>