<?php
require('../configs/db.php');

$fullname = $_POST['fullName'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// check duplicate email
$check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    header("Location: ../pages/register.php?msg=Email already exists");
    exit;
}

// insert user
mysqli_query($conn, "
    INSERT INTO users (username, email, password)
    VALUES ('$fullname', '$email', '$password')
");

$user_id = mysqli_insert_id($conn);

// create balance
mysqli_query($conn, "
    INSERT INTO balance (user_id, amount)
    VALUES ($user_id, 0)
");

session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['username'] = $fullname;

header("Location: ../pages/dashboard.php");
exit;