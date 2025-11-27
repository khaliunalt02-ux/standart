<?php
include("app/db/db.php");

if (isset($_GET['id'])) {
    $standard = selectOne('standard_projects', ['id' => $_GET['id']]);
};

$page = 'standards';
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
    <link rel="stylesheet" href="assets/standard-one.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Стандартын төсөл | Хот байгуулалт, хотын стандартын газар</title>
</head>
<body>

    <!-- navbar -->
    <?php 
        include("header.php")
    ?>
    <!-- end of navbar -->

    <!-- content -->
    <section class = "contact-section">
        <div class = "contact-bg">
            <!-- <h3>Get in Touch with Us</h3> -->
            <h2>Стандартын төсөл</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хот байгуулалт, хотын стандартын газар</p>
        </div>
    </section>

    <section id="standard-one">
        <div class="container">
            <div class="subcontainer">            
                <div class="standard-wrapper-pr">
                    <div class="standard-name">
                        <h3><span><?php echo $standard['code']; ?></span><?php echo $standard['name']; ?></h3>
                    </div>
                    <div class="standard-info">
                        <p><?php echo $standard['info']?></p>
                    </div>
                    <div class="download">
                        <a href="include/standard_projects/<?php echo $standard['file_path']; ?>" download="<?php echo $standard['code']; ?>"><i class="fa-solid fa-download"></i>Татаж авах</a>
                    </div>
                    <div class="link">
                        <a href="<?php echo $standard['sugg_link']; ?>"><i class="fa-solid fa-arrow-right-long"></i>Санал өгөх</a>
                    </div>
                    <div class="standard-pdf">        
                        <iframe id="pdf" src="include/standard_projects/<?php echo $standard['file_path']; ?>#zoom=96&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>           
                </div>
                <hr>
                <div class="form">
                    <?php echo $standard['sugg_path']; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end of content -->

   <!-- footer -->
    <section id="footer">
        <div class="container">
            <div class="subcontainer">
                <h1>Хот байгуулалт, хотын стандартын газар</h1>
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
                        <p>Улаанбаатар Хотын Захиргааны төв цогцолбор, <br> Наадамчдын зам-1201, Хан-Уул дүүрэг, 23-р хороо, Улаанбаатар хот</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of footer -->
    
    
        
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="assets/script.js"></script>
    <script src="assets/forpoll.js"></script>
</body>
</html>