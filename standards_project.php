<?php
include("app/db/db.php");

$projects = selectAll('standard_projects');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/standard.css">
    <link rel="stylesheet" href="assets/aboutus.css">
    <link rel="stylesheet" href="/JSTable-master/dist/jstable.css">
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

    <section id="standards">
        <div class="container">
            <div class="subcontainer">
                <div class="searchcontainer">
                    <div class="box">
                        <div class="search-box">
                            <input type="text" placeholder="Хайх" id="searchInput" onkeyup="tableSearch()">
                            <label for="" class="searchicon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="table">
                    <table id="mytable_projects">
                        <tbody>
                            <?php foreach($projects as $project): ?>
                                <tr>
                                    <td><span><?php echo $project['code']; ?></span><?php echo $project['name']; ?></td>
                                    <td><a href="standard-one-pr?id=<?php echo $project['id']; ?>">үзэх <i class="fa-solid fa-arrow-right-long"></i></a></td>
                                    <!--<td><a href="<?php echo $project['sugg_path']; ?>">санал өгөх <i class="fa-solid fa-arrow-right-long"></i></a></td>-->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!--<p>Одоогоор санал авч буй стандартын төсөл байхгүй.</p>-->
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
                        <p>Улаанбаатар Хотын Захиргааны төв цогцолбор, <br> Наадамчдын зам-1201, Хан-Уул дүүрэг, Улаанбаатар хот</p>
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