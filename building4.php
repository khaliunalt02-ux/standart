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
    <title>Цахим сэтгүүл | Хот байгуулалт, хотын стандартын газар </title>
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
                    <h1>Цахим Сэтгүүл<span></span></h1>
                    <!-- <h1><span></span></h1> -->
                </div>
            </div>
        </div>
    </section>

    <section id="intro1">
        <div class="container">
            <div class="subcontainer">
                <div class="standard-name">
                    <h3>Барилгын ажлын зөвшөөрлийн гэрчилгээ  шинээр олгох</h3>
                </div>
                <div class="standard-info">
                    <p>Энэхүү баримт бичиг нь хотын оршин суугчид амьдралын хэвийн үйл ажиллагаагаа явуулахад оролцох эрх үүргийн боломжит нийтлэг харилцааг зохицуулах талаар мэдээлэл, арга зүйн удирдамж, зан үйл, хийж хэвшүүлбэл зохих дадал, хотын соёлыг төлөвшүүлэх талаар зөвлөмжийг иж бүрнээр товч ойлгомжтой байдлаар тодорхойлоход оршино.</p>
                </div>
                <div class="download">
                    <a href="include/flipbook/15. УЛААНБААТАР ХОТЫН ОРШИН СУУГЧИЙН ГАРЫН АВЛАГА (1).pdf" download="Улаанбаатар хотын оршин суугчийн гарын авлага"><i class="fa-solid fa-download"></i>PDF татаж авах</a>
                </div>
            </div>
        </div>
    </section>

  
                <!-- Next Button -->
                <button id="next-btn3" class="button next">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </button>

            </div>
        </div>
    </section>
    <!-- end of content -->

    <!-- footer -->
    <section id="footer">
        <div class="container">
            <div class="subcontainer">
                <h1>Хот Байгуулалт, Хотын Стандартын Газар</h1>
                <hr>
                <div class="footer-content">
                    <div class="footer-item">
                        <h2>Утас</h2>
                        <p>99999999</p>
                    </div>
                    <div class="footer-item">
                        <h2>Цахим шуудан</h2>
                        <p>mail@mail.gov</p>
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