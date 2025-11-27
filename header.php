
<<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="assets/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <section id="header">
        <div class="header container">
              <nav class="navbar">
                <a href="index"><img src="images/УБСүлд_Үндсэн хувилбар_RGB.png" class="logo"></a>
                <ul class="nav-list">
                    <li><a class="<?php if($page=='home'){echo 'nav-active';}?>" href="index.php">Нүүр</a></li>
                    <li><a class="<?php if($page=='aboutus'){echo 'nav-active';}?>" href="aboutus">Бидний тухай</a>
                        <ul class="sub-menu">
                            <li class="hide"><a class="<?php if($page=='aboutus'){echo 'nav-active';}?>" href="aboutus">Бидний тухай</a></li>
                            <li class="hide"><a class="<?php if($page=='aboutus2'){echo 'nav-active';}?>" href="aboutus2">Газрын бүтэц зохион байгуулалт</a></li>
                            <li class="hide"><a class="<?php if($page=='zahirgaaU'){echo 'nav-active';}?>" href="positionTod">Албан тушаалын тодорхойлолт</a>
                            <!--<ul class="sub-menu">-->
                            <!--        <li class="hide"><a class="<?php if($page=='zahirgaaU'){echo 'nav-active';}?>" href="zahirgaaU">Захиргаа удирдлагын хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='EAA'){echo 'nav-active';}?>" href="EAA.php">Ерөнхий архитекторын ажлын алба</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='bhbh'){echo 'nav-active';}?>" href="bhbh.php">Барилга хот байгуулалтын хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='hth'){echo 'nav-active';}?>" href="HTH.php">Хот төлөвлөлтын хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='bbhchs'){echo 'nav-active';}?>" href="BBCHHS.php">Барилга байгууламжийн чанар стандартын хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='IDBTS'){echo 'nav-active';}?>" href="IDBTS.php">Инженерын дэд бүтцийн төлөвлөлтийн хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='DTDTH'){echo 'nav-active';}?>" href="DTDTH.php">Дэд төв дагуул хотын хөгжлийн хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='aboutus'){echo 'nav-active';}?>" href="DHHH.php">дотоод хяналт хуулийн хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='aboutus'){echo 'nav-active';}?>" href="hyanalt.php">Хот байгуулалт хяналтын хэлтэс</a></li>-->
                            <!--        <li class="hide"><a class="<?php if($page=='HOZMTH'){echo 'nav-active';}?>" href="HOZMTH.php">Хотын орон зай мэдээлэл технологийн хэлтэс</a></li>-->
                            <!--    </ul>-->
                            </li>
                        </ul>
                    </li>
                    <li class="hide"><a class="<?php if($page=='news'){echo 'nav-active';}?>" href="news.php">Мэдээ мэдээлэл</a></li>
                    <li class="hide"><a class="<?php if($page=='news'){echo 'nav-active';}?>" href="https://ebarilga.ub.gov.mn/">Цахим үйлчилгээ</a></li> 
                    <li><a class="<?php if($page=='service'){echo 'nav-active';}?>" href="ServicePdf.php" >Үйлчилгээ </a>
                    </li>
                    <li><a class="<?php if($page=='opendata'){echo 'nav-active';}?>">Ил тод байдал </a>
                       <ul class="sub-level">
                            <li class="hide"><a class="<?php if($page=='building2'){echo 'nav-active';}?>" href="building2.php">Хууль эрх зүй </a></li>
                            <li class="hide"><a class="<?php if($page=='building3'){echo 'nav-active';}?>" href="nuuts.php">Хүний нөөцийн ил тод байдал</a></li> 
                            <li class="hide"><a class="<?php if($page=='building1'){echo 'nav-active';}?>" href="performance-report.php">Үйл ажиллагааны ил тод байдал</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="avilaga.php">Авилагатай тэмцэх үйл ажиллагаа </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="sanhvv.php">Санхүүгийн нээлттэй мэдээлэл </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="//shilendans.gov.mn/organization">Шилэн данс</a></li>
                            <li class="hide"><a class="<?php if($page=='building5'){echo 'nav-active';}?>" href="tenders.php">Тендер  </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Тайлан мэдээ</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="erhzui.php">Ёс зүйн булан</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="irsen.php">Албан бичгийн мэдээ</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="urgudul.php">Өргөдөл, гомдол</a></li>
                        </ul>
                    </li>
                    <li class="hide"><a class="<?php if($page=='index'){echo 'nav-active';}?>" href="index.php">Хотын стандарт</a>
                        <ul class="sub-2">
                            <li class="hide"><a class="<?php if($page=='standard-introduction'){echo 'nav-active';}?>" href="standard-introduction.php">Стандартын танилцуулга</a></li>
                            <li class="hide"><a class="<?php if($page=='standards_project'){echo 'nav-active';}?>" href="standards_project.php">Стандартын төсөл</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Цахим сэтгүүл</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="standards.php">Хотын стандарт</a></li>
                        </ul>
                    </li>
                <div class="nav-icon">
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </nav>
        </div>
    </section>
</html>