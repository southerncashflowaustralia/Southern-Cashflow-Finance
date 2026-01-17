<?php
$conn = new mysqli("localhost", "root", "", "bank_db");

if ($conn->connect_error) {
    die("Database connection failed");
}