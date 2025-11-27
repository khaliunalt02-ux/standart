<?php
$page = 'building1';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/flipbook.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Дотоод хяналт хуулийн хэлтэс | Хот байгуулалт, хотын стандартын газар </title>
</head>

<body>

    <!-- navbar -->
    <?php
    include("header.php")
    ?>
    <!-- end of navbar -->

    <!-- content -->
    <section id="name">
        <div class="container">
            <div class="banner-container">
                <div class="name">
                    <!-- <span class="sub-title">Нийслэлийн Засаг Даргын Хэрэгжүүлэгч Агентлаг</span> -->
                    <h1>Дотоод хяналт хуулийн хэлтэс<span></span></h1>
                    <!-- <h1><span></span></h1> -->
                </div>
            </div>
        </div>
    </section>
    <?php
    // neg nartai odor base aas awdag bolgox
    // name, file geed salgaad filename ee mongol vseg gvi bwal deer tatax bol yaxaw
    $legal = [
        "Ёс зүйн дэд хорооны үйл ажилгааны 2025 оны төлөвлөгөө",
        
    ];
    foreach ($legal as $name) {
    ?>
        <section id="intro1">
            <div class="container">
                <div class="subcontainer">
                    <div class="standard-name">
                        <h3><?php echo $name ?></h3>
                    </div>
                    <div class="standard-info">

                    </div>
                    <div class="standard-pdf">
                        <iframe id="pdf" src="include/flipbook/<?php echo $name ?>.pdf#zoom=96&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>
                    <!--<div class="download">-->
                    <!--    <a href="include/flipbook/<?php echo $name ?>.pdf" download=><i class="fa-solid fa-download"></i>PDF татаж авах</a>-->
                    <!--</div>-->
                </div>
            </div>
        </section>
        

    <?php
    }
    ?>
    <!-- footer -->
    <section id="footer">
        <div class="container">
            <div class="subcontainer">
                <h1>Хот Байгуулалт, Хотын Стандартын Газар</h1>
                <hr>
                <div class="footer-content">
                    <div class="footer-item">
                        <h2>Утас</h2>
                        <p>72707700</p>
                    </div>
                    <div class="footer-item">
                        <h2>Цахим шуудан</h2>
                        <p>info@uda.ub.gov.mn</p>
                    </div>
                    <div class="footer-item">
                        <h2>Хаяг</h2>
                        <p>Улаанбаатар Хотын Захиргааны төв цогцолбор, <br> Наадамчдын зам, Хан-Уул</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of footer -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="okzoom/Lightweight-Image-Inner-Zoom-Magnifier-Plugin-For-jQuery-okzoom//src/okzoom.js"></script>
    <script src="assets/flipbook.js" defer></script>
    <script src="assets/flipbook2.js" defer></script>
    <script src="assets/flipbook3.js" defer></script>



</body>

</html>