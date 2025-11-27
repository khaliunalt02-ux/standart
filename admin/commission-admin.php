<?php
include("../app/db/users.php");
include("commission-create.php");



$barilga = selectAll('commission_bb_22' . " ORDER BY id DESC");
$zasvar = selectAll('commission_zt_22' . " ORDER BY id DESC");

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
    <title>Админ | Комиссын хуваарь</title>
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
                <a href="standard-admin"><li>Стандарт</li></a>
                <a href="commission-admin" class="active"><li>Комиссын хуваарь</li></a>
                <a href=""><li>Сул орон тоо</li></a>
            </ul>
        </div>
        <div class="content">
            <div class="content-wrapper">
                <h1>Вебсайтад комиссын хуваарь байршуулах</h1>
                <div class="filter-container">
                    <div class="filter-item bb" data-filter="barilga"><span>Барилга байгууламж</span></div>
                    <div class="filter-item zs" data-filter="zasvar"><span>Засвар, тохижилт</span></div>
                </div>
                <div class="barilga">
                    <div class="input">
                        <form action="commission-admin.php" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $id ?>">
                            <input name="date_range" type="text" value="<?php echo $date ?>" placeholder="Огноо" required>
                            <div class="pdf-upload">
                                <?php if (!empty($pdf)): ?>
                                    <label class="custom-file-upload" for="pdf-barilga">
                                        <?php echo $pdf; ?>
                                    </label>
                                <?php else: ?>
                                    <label class="custom-file-upload" for="pdf-barilga">
                                        PDF сонгох
                                    </label>
                                <?php endif; ?>
                                <input name="file_path" id="pdf-barilga" class="input-btn" type="file" accept=".pdf">
                            </div>
                            <button id="publish" type="submit" name="publish-bb">Нийтлэх</button>
                            <button id="update" type="submit" name="update-bb">Шинэчлэх</button>
                        </form>
                    </div>
                    <div class="existing-list">
                        <div class="boxes com-list">
                            <?php foreach($barilga as $bb): ?>
                                <div class="list-box1">
                                    <p><?php echo $bb['date_range']; ?></p>
                                    <div>
                                        <a href="commission-admin?id=<?php echo $bb['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="commission-admin?delete_id=<?php echo $bb['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>
                <div class="barilga zasvar">
                    <div class="input">
                        <form action="commission-admin.php" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $idzs ?>">
                            <input name="date_range" type="text" value="<?php echo $datezs ?>" placeholder="Огноо" required>
                            <div class="pdf-upload">
                                <?php if (!empty($pdfzs)): ?>
                                    <label class="custom-file-upload" for="pdf-barilga">
                                        <?php echo $pdfzs; ?>
                                    </label>
                                <?php else: ?>
                                    <label class="custom-file-upload" for="pdf-barilga">
                                        PDF сонгох
                                    </label>
                                <?php endif; ?>
                                <input name="file_path" id="pdf-zasvar" class="input-btn" type="file" accept=".pdf">
                            </div>
                            <button id="publish-zs" type="submit" name="publish-zs">Нийтлэх</button>
                            <button id="update-zs" type="submit" name="update-zs">Шинэчлэх</button>
                        </form>
                    </div>
                    <div class="existing-list-zs">
                        <div class="zasvar-boxes com-list">
                            <?php foreach($zasvar as $zs): ?>
                                <div class="list-box1">
                                    <p><?php echo $zs['date_range']; ?></p>
                                    <div>
                                        <a href="commission-admin?idzs=<?php echo $zs['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="commission-admin?delete_idzs=<?php echo $zs['id']; ?>"><i class="fa-solid fa-trash"></i></a>
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
    <script src="commission-admin.js"></script>
    <script>
        const pdfinput = document.querySelector('.input-btn');
        pdfinput.addEventListener('change', function() {
            console.log({file: pdfinput.files[0]});
        });
    </script>
    
</body>
</html>