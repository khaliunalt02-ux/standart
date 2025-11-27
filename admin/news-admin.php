<?php

session_start();

include("../app/db/users.php");

// ---------- INIT VARIABLES ----------
$title = '';
$content = '';
$featured = '';
$additional = '';

$posts = selectAll('post' . " ORDER BY id DESC");

// ---------- LOAD POSTS ----------
$sqlPosts = "SELECT * FROM post ORDER BY id DESC";
if ($res = $conn->query($sqlPosts)) {
    while ($row = $res->fetch_assoc()) {
        $posts[] = $row;
    }
    $res->free();
} else {
    error_log("Failed to load posts: " . $conn->error);
}

// Хэрэв хэрэглэгч нэвтрээгүй бол буцаах
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

/* ---------- DELETE ---------- */
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql = "DELETE FROM post WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $delete_id);
        if (!$stmt->execute()) {
            error_log("Delete failed: " . $stmt->error);
        }
        $stmt->close();
    } else {
        error_log("Prepare failed (delete): " . $conn->error);
    }
    header("Location: news-admin.php");
    exit();
}

/* ---------- EDIT (LOAD FOR EDIT FORM) ---------- */
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM post WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();
        $stmt->close();
        if ($post) {
            $title = $post['title'];
            $content = $post['content'];
            $featured = $post['attach_path'];
            $additional = $post['additional_img'] ?? '';
        }
    } else {
        error_log("Prepare failed (select): " . $conn->error);
    }
}

/* ---------- UPDATE (PROCESS POST) ---------- */
if (isset($_POST['update-btn'])) {

    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    // Хуучин attach_path-г авна (хэрэв form-аар load хийгдээгүй бол)
    $currentFeatured = '';
    $q = "SELECT attach_path FROM post WHERE id = ?";
    if ($s = $conn->prepare($q)) {
        $s->bind_param("i", $id);
        $s->execute();
        $r = $s->get_result();
        $row = $r->fetch_assoc();
        $currentFeatured = $row['attach_path'] ?? '';
        $s->close();
    }

    $featuredToSave = $currentFeatured;

    // Хэрэв шинэ файл оруулсан бол upload хийнэ
    if (!empty($_FILES['attach_path']['name'])) {
        $uploadedName = basename($_FILES['attach_path']['name']);
        $safeName = time() . "_" . preg_replace('/[^A-Za-z0-9.\-_]/', '', $uploadedName);
        $targetDir = "../uploads/";
        if (move_uploaded_file($_FILES['attach_path']['tmp_name'], $targetDir . $safeName)) {
            $featuredToSave = $safeName;
            // Хэрэв шаардлагатай бол хуучин файлыг устгаж болно:
            // if (!empty($currentFeatured) && file_exists($targetDir . $currentFeatured)) unlink($targetDir . $currentFeatured);
        } else {
            error_log("Failed to move uploaded file for update id $id");
        }
    }

    $sql = "UPDATE post SET title = ?, content = ?, attach_path = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $title, $content, $featuredToSave, $id);
        if (!$stmt->execute()) {
            error_log("Update failed: " . $stmt->error);
        }
        $stmt->close();
    } else {
        error_log("Prepare failed (update): " . $conn->error);
    }

    header("Location: news-admin.php");
    exit();
}

/* ---------- CREATE (PUBLISH) ---------- */
if (isset($_POST['publish-btn'])) {

    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $featuredToSave = '';

    if (!empty($_FILES['attach_path']['name'])) {
        $uploadedName = basename($_FILES['attach_path']['name']);
        $safeName = time() . "_" . preg_replace('/[^A-Za-z0-9.\-_]/', '', $uploadedName);
        $targetDir = "../uploads/";
        if (move_uploaded_file($_FILES['attach_path']['tmp_name'], $targetDir . $safeName)) {
            $featuredToSave = $safeName;
        } else {
            error_log("Failed to move uploaded file for new post");
        }
    }

    $sql = "INSERT INTO post (title, content, attach_path) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $title, $content, $featuredToSave);
        if (!$stmt->execute()) {
            error_log("Insert failed: " . $stmt->error);
        }
        $stmt->close();
    } else {
        error_log("Prepare failed (insert): " . $conn->error);
    }

    header("Location: news-admin.php");
    exit();
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="ckeditor/sample/styles.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">

    <title>Админ | Мэдээ</title>
</head>

<body>

    <section id="header">
        <div class="header container">
            <nav class="navbar">
                <div class="nav-1">
                    <a href="index.html"><img src="../images/hot_goldoo_tsagaan_rounded.png" class="logo"></a>
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="#"><i class="fa-solid fa-circle-user"></i></a>
                        <?php if(isset($_SESSION['id'])): ?>
                        <ul class="user-op">
                            <p class="name"><?php echo $_SESSION['username']; ?></p>
                            <li><a href="<?php echo '../logout' ?>"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
                        </ul>
                        <?php endif ?>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="wrapper">
        <div class="sidebar">
            <ul>
                <a href="dashboard.html">
                    <li>Хянах самбар</li>
                </a>
                <a href="news-admin" class="active">
                    <li>Мэдээ</li>
                </a>
                <a href="standard-admin">
                    <li>Стандарт</li>
                </a>
                <a href="commission-admin">
                    <li>Комиссын хуваарь</li>
                </a>
                <a href="">
                    <li>Сул орон тоо</li>
                </a>
            </ul>
        </div>
        <div class="content">
            <div class="content-wrapper">
                <h1>Вебсайтад мэдээ нийтлэх</h1>
                <div class="columns">
                    <div class="input">
                        <form action="news-admin.php" method="post" enctype="multipart/form-data">
                            <input name="title" type="text" value="<?php echo $title ?>" placeholder="Гарчиг" required>
                            <textarea name="content" id="editor"><?php echo $content ?></textarea>
                            <div class="images-upload">
                                <?php if (!empty($featured)): ?>
                                <label class="custom-file-upload" for="featured">
                                    <?php echo $featured; ?>
                                </label>
                                <?php else: ?>
                                <label class="custom-file-upload" for="featured">
                                    Үндсэн зураг сонгох
                                </label>
                                <?php endif; ?>
                                <input name="attach_path" id="featured" class="input-btn" type="file" accept="image/*">
                                <?php if (!empty($additional)): ?>
                                <label class="custom-file-upload" for="additional">
                                    <?php echo $additional; ?>
                                </label>
                                <?php else: ?>
                                <label class="custom-file-upload" for="additional">
                                    Нэмэлт зураг сонгох
                                </label>
                                <?php endif; ?>
                                <input name="additional_img[]" id="additional" class="input-btn" type="file"
                                    multiple="multiple" accept="image/*">
                            </div>
                            <button id="publish" type="submit" name="publish-btn">Нийтлэх</button>
                            <button id="update" type="submit" name="update-btn">Шинэчлэх</button>
                        </form>
                    </div>
                    <div class="existing-list">
                        <div class="boxes">
                            <?php foreach($posts as $post): ?>
                            <div class="list-box">
                                <p><?php echo $post['title']; ?></p>
                                <div>
                                    <a href="news-admin?id=<?php echo $post['id']; ?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="news-admin?delete_id=<?php echo $post['id']; ?>"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <div class="sidebar">

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="ckeditor/build/ckeditor.js"></script>
    <script src="news-admin.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor'), {

            licenseKey: '',
            placeholder: 'Агуулгыг энд бичнэ үү!'


        })
        .then(editor => {
            window.editor = editor;




        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error(
                'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
            console.warn('Build id: 2r67qmqb0r7y-lz40wfp7yzdt');
            console.error(error);
        });

    const imageinput = document.querySelector('.input-btn');
    imageinput.addEventListener('change', function() {
        console.log({
            file: imageinput.files[0]
        });
    });
    </script>
    <script>
    $('.fa-circle-user').click(function() {
        $('.user-op').toggle();
    })
    </script>
</body>

</html>