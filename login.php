<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        .login-box {
            width: 350px;
            margin: 120px auto;
            padding: 25px;
            background: white;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <!-- IMPORTANT FIX IS HERE -->
    <form method="POST" action="../scripts/login_auth.php">
<input type="text" name="email" placeholder="Username or Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>