<?php
include("app/db/db.php");

$headlines = selectAll('post' . " ORDER BY id DESC LIMIT 5");
$page = 'home';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Хотын стандартын тогтолцоог хөгжүүлж хотын засаглал, бүтээн байгуулалт, бүтээгдэхүүн, үйлчилгээнд дэлхийн жишигт хүрсэн чанарыг нэвтрүүлж иргэдийн эрүүл аюулгүй орчинд амьдрах эрхийг хангах зорилго бүхий агентлаг юм.">
    <link rel="stylesheet" href="assets/main.css">
    <!--<link rel="stylesheet" href="assets/atg.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png"> 
<title>ХОТ БАЙГУУЛАЛТ, ХОТЫН СТАНДАРТЫН ГАЗАР</title>
</head>
<body>
    <!-- navbar -->
    <?php 
                           include("header.php")
    ?>
  
    <!--<li>-->
    <!--                    <a href="#">ҮЙЛЧИЛГЭЭ-->
    <!--                        <i class="fa-solid fa-angle-down"></i>-->
    <!--                    </a>-->
    <!--                    <ul class="sub">-->
    <!--                        <li>-->
    <!--                            <a href="#">Барилга, байгууламжийг ашиглалтад оруулах-->
    <!--                                <i class="fa-solid fa-angle-down"></i>-->
    <!--                            </a>-->
    <!--                            <ul class="sub2">-->
    <!--                                <li><a href="https://e-mongolia.mn/service/barilga-baiguulamjiig-ashiglaltad-oruulakh-khuselt-khuleen-avakh-">Цахимаар хүсэлт гаргах</a></li>-->
    <!--                                <li><a href="commission">Комиссын хуваарь</a></li>-->
    <!--                                <li><a href="include/other/Саналын хуудас үүрэг даалгаврын биелэлт.pdf">Үүрэг даалгаврын биелэлтийн хуудас</a></li>-->
    <!--                                <li><a href="include/other/Ashig sonirhliin zurchilgui medegdliin_mayagt.pdf">Ашиг сонирхлын мэдэгдлийн маягт</a></li>-->
    <!--                            </ul>-->
    <!--                        </li>-->
    <!--                        <li><a href="spatialdb">Орон зайн мэдээллийн сан</a></li>-->
    <!--                        <li><a href="technical-report">Барилгын техникийн дүгнэлт</a></li>-->
    <!--                        <li><a href="include/other/NEG HOT.pdf">Барилгын түр хашааны загвар</a></li>-->
    <!--                        <li><a href="survey">Сэтгэл ханамжийн судалгаа</a></li>-->
                            <!-- <li><a href="#">Барилга байгууламжийг ашиглалтад оруулах</a></li> -->
    <!--                    </ul>-->
    <!--                </li>-->
    <!--                <li>-->
    <!--                    <a href="#">ИЛ ТОД БАЙДАЛ-->
    <!--                        <i class="fa-solid fa-angle-down"></i>-->
    <!--                    </a>-->
    <!--                    <ul class="sub">-->
    <!--                        <li>-->
    <!--                            <a href="positions">Нээлттэй ажлын байр-->
                                    <!--<i class="fa-solid fa-angle-down"></i>-->
    <!--                            </a>-->
                                <!--<ul class="sub2-2">-->
                                <!--    <li><a href="positions">Сул орон тоо</a></li>-->
                                <!--    <li><a href="#">Хүний нөөцийн стратеги</a></li>-->
                                <!--</ul>-->
    <!--                        </li>-->
    <!--                        <li><a href="att">Албан тушаалын тодорхойлолт</a></li>-->
    <!--                        <li>-->
    <!--                            <a href="tender">Тендерийн урилга-->
                                    <!--<i class="fa-solid fa-angle-down"></i>-->
    <!--                            </a>-->
                                <!--<ul class="sub2-3">-->
                                <!--    <li><a href="#">ХАА-ны төлөвлөгөө</a></li>-->
                                <!--    <li><a href="#">ХАА-ны тайлан</a></li>-->
                                <!--    <li><a href="tender">Тендерийн урилга</a></li>-->
                                <!--</ul>-->
    <!--                        </li>-->
    <!--                        <li><a href="plan">Төлөвлөгөө</a></li>-->
    <!--                        <li>-->
    <!--                            <a href="#">Тайлан мэдээ-->
    <!--                                <i class="fa-solid fa-angle-down"></i>-->
    <!--                            </a>-->
    <!--                            <ul class="sub2-4">-->
    <!--                                <li><a href="annual-report">Жилийн үйл ажиллагааны тайлан</a></li>-->
    <!--                                <li><a href="bodlogo-biyelelt">Бодлогын баримт бичгийн биелэлт</a></li>-->
    <!--                                <li><a href="togtool-biyelelt">Тогтоол, шийдвэрийн биелэлт</a></li>-->
    <!--                                <li><a href="audit-report">Санхүүгийн тайлан</a></li>-->
    <!--                                <li><a href="hr-report">Хүний нөөцийн хөгжлийн тайлан</a></li>-->
    <!--                                <li><a href="albanbichig">Албан бичиг, өргөдөл гомдлын шийдвэрлэлт</a></li>-->
    <!--                            </ul>-->
    <!--                        </li>-->
    <!--                        <li><a href="legal">Хууль, эрх зүй</a></li>-->
    <!--                        <li><a href="tushaal">Тушаал, шийдвэр</a></li>-->
    <!--                        <li><a href="https://shilendans.gov.mn/organization/30504">Шилэн данс</a></li>-->
    <!--                    </ul>-->
    <!--                </li>-->
    <!--                <li><a href="contactus">ХОЛБОО БАРИХ</a></li>-->
    <!--            </ul>-->
    <!--            <div class="nav-icon">-->
    <!--                <i class="fa-solid fa-bars"></i>-->
    <!--                <i class="fa-solid fa-xmark"></i>-->
    <!--            </div>-->
    <!--        </nav>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end of navbar -->

    <!-- banner -->
    <section id="name">
        <div class="container">
            <div class="name">
                <span class="sub-title">Нийслэлийн Засаг Даргын Хэрэгжүүлэгч Агентлаг</span>
                <h1>ХОТ БАЙГУУЛАЛТ<span></span></h1>
                <h1>ХОТЫН СТАНДАРТЫН ГАЗАР<span></span></h1>
            </div>
            <div class="card-wrapper">
                <a href="standards">
                    <div class="card"
                        data-hover="Үзэх">
                        <h2>52</h2>
                        <p>Хотын<br> стандарт</p>
                        
                    </div>
                </a>
                <a href="standards_project">
                    <div class="card"
                        data-hover="Үзэх">
                        <h2>0</h2>
                        <p>Стандартын төсөл</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    
    <!--<section id="announcement">-->
    <!--    <div class="container">-->
    <!--        <div class="subcontainer">-->
    <!--            <a href="poll">-->
    <!--                <div class="ancmt-wrapper">-->
    <!--                    <div class="dayscount">-->
    <!--                        <h2 id="daysleft"></h2>-->
    <!--                        <p>хоног үлдсэн</p>-->
    <!--                    </div>-->
    <!--                    <div class="left">-->
    <!--                        <p>Хотын стандарт боловсруулах, батлуулах, хэрэгжүүлэх үйл ажиллагааны журмын төсөлд санал авч байна.</p>-->
    <!--                        <span>САНАЛ ӨГӨХ</span>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    
    <!--<section id="announcement">-->
    <!--    <div class="container">-->
    <!--        <div class="subcontainer">-->
    <!--            <a href="poll">-->
    <!--                <img src="images/juram.png" alt="">-->
    <!--            </a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    
    <?php 
        // include("event.php")
        include("svg.php")
    ?>
    
    
  

   
    <!-- end of text section -->


    <!-- services -->
    <section id="services">
        <div class="container">
            <div class="subcontainer">
                <div class="services">
                    <h2>ҮЙЛЧИЛГЭЭ</h2>
                </div>
                <br>
                <div class="card-grid">
                    <a class="servicecard" href="commission">
                      <div class="card__background" style="background-image: url(images/service1.jpg)"></div>
                      <div class="card__content">
                        <!--<p class="card__category">Үйлчилгээ</p>-->
                        <h3 class="card__heading">Мэргэжлийн зөвлөлийн хурлын жагсаалт, санал</h3>
                      </div>
                    </a>
                    <a class="servicecard" href="https://ebarilga.ub.gov.mn/">
                      <div class="card__background" style="background-image: url(images/service2-2.jpg)"></div>
                      <div class="card__content">
                        <!--<p class="card__category">Үйлчилгээ</p>-->
                        <h3 class="card__heading">eBarilga хот байгуулалтын цахим систем</h3>
                      </div>
                    </a>
                    <a class="servicecard" href="https://e-mongolia.mn/home">
                      <div class="card__background" style="background-image: url(images/service3-2.jpg)"></div>
                      <div class="card__content">
                        <!--<p class="card__category">Үйлчилгээ</p>-->
                        <h3 class="card__heading">e-Mongolia</h3>
                      </div>
                    </li>
                    <a class="servicecard" href="standards">
                      <div class="card__background" style="background-image: url(images/service4.jpg)"></div>
                      <div class="card__content">
                        <!--<p class="card__category">Үйлчилгээ</p>-->
                        <h3 class="card__heading">Хотын стандартууд</h3>
                      </div>
                    </a>
                  <div>
            </div>
        </div>
    </section>
    <!-- end of services -->



    <!-- video -->
    <section id="video">
        <div class="container">
            <div class="subcontainer">
                <div class="video">
                    <h2>ВИДЕО СУВАГ</h2>
                </div>
                <br>
                <div class="video-grid">
                    <div class="video-content">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/3wV59xiVJw0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-content">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/DCwueMsr444" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-content">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/ccfg_GPexHk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <br>
                <div class="readmore">
                    <a href="https://www.youtube.com/channel/UCugdOyzQRzgZlo_XtT--rVA/videos">YouTube
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of video -->
    
    <section id="atg">
        <div class="container">
            <div class="subcontainer">
                <div class="atg-wrapper">
                    <div class="img-wrapper">
                        <div class="atg-logo">
                            <img src="images/AVLIGA_Logo.png" alt="">
                        </div>
                        <div class="qr">
                            <img src="images/qr-code.png" alt="">
                        </div>
                    </div>
                    <div class="atg-left">
                        <div class="avilga-intro">
                            <h2>Таны эрх, таны оролцоо.</h2>
                            <h2>Авлигад үгүй гэж хэлье!</h2>
                        </div>
                        <p>Авлигыг мэдээлэх:</p>
                        <a href="https://iaac.mn/gomdol-medeelel-uguh"><i class="fa-solid fa-comment-dots"></i>www.iaac.mn</a>
                        <a href=""><i class="fa-solid fa-phone"></i> (+976) 110</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    <section id="atg-2">
        <div class="container">
            <a href="https://iaac.mn/gomdol-medeelel-uguh">
                <div class="subcontainer">
                    <img src="images/ATG-3-transparent2.png" alt="">
                </div>
            </a>
        </div>
    </section>
    
    <!--<section id="atg-video">-->
    <!--    <div class="container">-->
    <!--        <div class="subcontainer">-->
    <!--            <div class="atg-video">-->
    <!--                <div class="main-video">-->
    <!--                    <iframe width="791" height="444.94" src="https://www.youtube.com/embed/4whCEkbgCYM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>-->
    <!--                </div>-->
    <!--                <div class="context">-->
    <!--                    <h3>Албан тушаалтны ХОМ-тэй танилцах, мэдээлэл өгөх тухай</h3>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

   <!-- footer -->
    <section id="footer">
        <div class="container">
            <div class="subcontainer">
                <h1>ХОТ БАЙГУУЛАЛТ, ХОТЫН СТАНДАРТЫН ГАЗАР</h1>
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
                        <p>Нийслэлийн нутгийн захиргааны байгууллагуудын төв ордон, <br> Наадамчдын зам-1201, Хан-Уул дүүрэг, 23-р хороо, Улаанбаатар хот</p>
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