<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Админ Цэс</title>
</head>
<body>
    <h1>Админ цэс</h1>

    <nav>
        <ul>
            <li><a href="add-news.php">Мэдээ нэмэх</a></li>
            <li><a href="news-list.php">Мэдээний жагсаалт</a></li>
            <li><a href="logout.php">Гарах</a></li>
        </ul>
    </nav>
</body>
</html>