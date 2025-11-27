+<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: login.php");
    exit();
}

$errors = [];
$title = $content = $category = $publish_date = "";
$status = "draft";
$imagePath = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $category = trim($_POST["category"]);
    $publish_date = $_POST["publish_date"];
    $status = $_POST["status"];

    // Шалгалтууд
    if (empty($title)) $errors[] = "Гарчиг оруулна уу.";
    if (empty($content)) $errors[] = "Агуулга оруулна уу.";
    if (empty($category)) $errors[] = "Ангилал сонгоно уу.";
    if (empty($publish_date)) $errors[] = "Огноо оруулна уу.";

    // Хайртайшүү хэнээ зургаа орууларай 
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowed = ["jpg", "jpeg", "png", "gif"];
        $fileName = $_FILES["image"]["name"];
        $fileTmp = $_FILES["image"]["tmp_name"];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileExt, $allowed)) {
            $errors[] = "Зөвхөн JPG, PNG, GIF зураг оруулна уу.";
        } else {
            $newFileName = uniqid("news_") . "." . $fileExt;
            $uploadDir = "uploads/news/";
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $uploadFile = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmp, $uploadFile)) {
                $imagePath = $uploadFile;
            } else {
                $errors[] = "Зургийг серверт хадгалах үед алдаа гарлаа.";
            }
        }
    }

    if (empty($errors)) {
        // DB холболт
        $pdo = new PDO("mysql:host=localhost;dbname=your_db;charset=utf8", "db_user", "db_pass");
        $stmt = $pdo->prepare("INSERT INTO news (title, content, category, publish_date, image, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $content, $category, $publish_date, $imagePath, $status]);

        header("Location: news.php?msg=Мэдээ амжилттай нэмэгдлээ");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Мэдээ нэмэх</title>
    <style>
        label { display: block; margin-top: 10px; }
        input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; }
        .error { color: red; }
        .btn { margin-top: 15px; padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Мэдээ нэмэх</h1>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
            <?php foreach ($errors as $e): ?>
                <li><?=htmlspecialchars($e)?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="news.php" method="post" enctype="multipart/form-data">
        <label>Гарчиг:</label>
        <input type="text" name="title" value="<?=htmlspecialchars($title)?>" required>

        <label>Агуулга:</label>
        <textarea name="content" rows="6" required><?=htmlspecialchars($content)?></textarea>

        <label>Ангилал:</label>
        <select name="category" required>
            <option value="">-- Сонгох --</option>
            <option value="Зарлал" <?= $category=="Зарлал" ? "selected" : "" ?>>Зарлал</option>
            <option value="Мэдээ" <?= $category=="Мэдээ" ? "selected" : "" ?>>Мэдээ</option>
            <option value="Үйл явдал" <?= $category=="Үйл явдал" ? "selected" : "" ?>>Үйл явдал</option>
        </select>

        <label>Огноо:</label>
        <input type="date" name="publish_date" value="<?=htmlspecialchars($publish_date)?>" required>

        <label>Зураг (Optional):</label>
        <input type="file" name="image" accept="image/*">

        <label>Төлөв:</label>
        <select name="status">
            <option value="draft" <?= $status=="draft" ? "selected" : "" ?>>Хадгалах (Нийтлэхгүй)</option>
            <option value="published" <?= $status=="published" ? "selected" : "" ?>>Нийтлэх</option>
        </select>

        <button type="submit" class="btn">Хадгалах / Нийтлэх</button>
    </form>
</body>
</html>