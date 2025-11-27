<?php
include("../app/db/users.php");
include("standard-create.php");

$standards = selectAll('standards' . " ORDER BY id DESC");
$projects = selectAll('standard_projects' . " ORDER BY id DESC");

if(!isset($_SESSION['username'])){
    header("Location: ../login");
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
    <title>Админ | Стандарт</title>
</head>
<body>

    <section id="header">
        <div class="header container">
            <nav class="navbar">
                <div class="nav-1">
                    <a href="index.html">
                        <img src="../images/hot_goldoo_tsagaan_rounded.png" class="logo"></a>
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="#"><i class="fa-solid fa-circle-user"></i></a>
                        <?php if(isset($_SESSION['id'])): ?>
                            <ul class="user-op">
                                <p class="name"><?php echo $_SESSION['username']; ?></p>
                                <li><a href="<?php echo '../login' ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
                            </ul>
                        <?php endif?>
                        
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="wrapper">
        <div class="sidebar">
            <ul>
                <a href="dashboard"><li>Хянах самбар</li></a>
                <a href="news-admin"><li>Мэдээ</li></a>
                <a href="standard-admin" class="active"><li>Стандарт</li></a>
                <a href="commission-admin"><li>Комиссын хуваарь</li></a>
                <a href=""><li>Сул орон тоо</li></a>
            </ul>
        </div>
        <div class="content">
            <div class="content-wrapper">
                <h1>Вебсайтад стандарт байршуулах</h1>
                <div class="filter-container">
                    <div class="filter-item st" data-filter="standard"><span>Батлагдсан стандарт</span></div>
                    <div class="filter-item pj" data-filter="project"><span>Стандартын төсөл</span></div>
                </div>
                <div class="standard">
                    <div class="input">
                        <form action="standard-admin.php" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $idstd ?>">
                            <div class="std-name">
                                <input name="code" type="text" value="<?php echo $codestd ?>" placeholder="Стандартын дугаар" required>
                                <input name="name" type="text" value="<?php echo $namestd ?>" placeholder="Стандартын нэр" required>
                            </div>
                            <div class="pdf-upload">
                                <?php if (!empty($pdfstd)): ?>
                                    <label class="custom-file-upload" for="pdf-standard">
                                        <?php echo $pdfstd; ?>
                                    </label>
                                <?php else: ?>
                                    <label class="custom-file-upload" for="pdf-standard">
                                        PDF сонгох
                                    </label>
                                <?php endif; ?>
                                <input name="file_path" id="pdf-standard" class="input-btn" type="file" accept=".pdf">
                            </div>
                            <button id="publish" type="submit" name="publish-standard">Нийтлэх</button>
                            <button id="update" type="submit" name="update-standard">Шинэчлэх</button>
                        </form>
                    </div>
                    <div class="existing-list">
                        <div class="boxes">
                            <?php foreach($standards as $standard): ?>
                                <div class="list-box">
                                    <p><span><?php echo $standard['code']; ?></span><?php echo $standard['name']; ?></p>
                                    <div>
                                        <a href="standard-admin?id=<?php echo $standard['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="standard-admin?delete_id=<?php echo $standard['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>
                <div class="standard project">
                    <div class="input">
                        <form action="standard-admin.php" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $idpj ?>">
                            <div class="std-name">
                                <input name="code" type="text" value="<?php echo $codepj ?>" placeholder="Стандартын дугаар" required>
                                <input name="name" type="text" value="<?php echo $namepj ?>" placeholder="Стандартын нэр" required>
                            </div>
                            <input name="sugg_path" class="wo-margin" type="text" value="<?php echo $linkpj ?>" placeholder="Санал өгөх линк" required>
                            <div class="pdf-upload">
                                <?php if (!empty($pdfpj)): ?>
                                    <label class="custom-file-upload" for="pdf-project">
                                        <?php echo $pdfpj; ?>
                                    </label>
                                <?php else: ?>
                                    <label class="custom-file-upload" for="pdf-project">
                                        PDF сонгох
                                    </label>
                                <?php endif; ?>
                                <input name="file_path" id="pdf-project" class="input-btn" type="file" accept=".pdf">
                            </div>
                            <button id="publish-pj" type="submit" name="publish-project">Нийтлэх</button>
                            <button id="update-pj" type="submit" name="update-project">Шинэчлэх</button>
                        </form>
                    </div>
                    <div class="existing-list-pj">
                        <div class="project-boxes">
                            <?php foreach($projects as $project): ?>
                                <div class="list-box">
                                    <p><span><?php echo $project['code']; ?></span><?php echo $project['name']; ?></p>
                                    <div>
                                        <a href="standard-admin?idpj=<?php echo $project['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="standard-admin?delete_idpj=<?php echo $project['id']; ?>"><i class="fa-solid fa-trash"></i></a>
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
    <script src="standard-admin.js"></script>
    <script>
        const imageinput = document.querySelector('.input-btn');
        imageinput.addEventListener('change', function() {
            console.log({file: imageinput.files[0]});
        });
    </script>
    
</body>
</html>