<?php

$host = 'localhost:3306';
$user = 'mpaubgov_new';
$pass = 'pPKqDg6.l^6D';
$db_name = 'mpaubgov_new';

$conn = new mysqli($host, $user, $pass, $db_name);

// UTF-8 (зөв хэлбэр)
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

