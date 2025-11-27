
<!DOCTYPE html>
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
                    <li><a class="<?php if($page=='aboutus'){echo 'nav-active';}?>" href="aboutus">Бидний тухай</a></li>
                      <li class="hide"><a class="<?php if($page=='news'){echo 'nav-active';}?>" href="news.php">Мэдээ мэдээлэл</a></li>
                      <li class="hide"><a class="<?php if($page=='news'){echo 'nav-active';}?>" href="https://ebarilga.ub.gov.mn/">Цахим үйлчилгээ</a></li>
                       
                            <li><a class="<?php if($page=='aboutus'){echo 'nav-active';}?>" href="aboutus">Үйлчилгээ </a>
                        <ul class="sub-menu">
                            <li class="hide"><a class="<?php if($page=='flipbook1'){echo 'nav-active';}?>" href="flipbook1.php">1.Барилга, байгууламж барих /АТД/хүсэлт</a></li>
                            <li class="hide"><a class="<?php if($page=='standards_project'){echo 'nav-active';}?>" href="standards_project.php">2.Загвар зураг батлуулах хүсэлт</a></li>
                            <li class="hide"><a class="<?php if($page=='building1'){echo 'nav-active';}?>" href="building1.php">3.Барилгын ажлын зөвшөөрөл гэрчилгээний хүсэлт</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">4.Шугам сүлжээний ажлын зураг зөвшилцөх хүсэлт</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">5.Барилгад хаяг дугаар олгох, мэдээллийн санд бүртгүүлэх хүсэлт</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">6.Зурган мэдээлэл авах хүсэлт</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">7.Тэг тэнхлэгийн актыг мэдээллийн санд бүртгэх</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">8.Байр зүйн зургийг мэдээллийн санд бүртгэх </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">9.Паспортжуулалтын дүгнэлт гаргуулах хүсэлт</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">10.Архивын лавлагаа авах хүсэлт
                        </ul>
                      </li>
                       <li><a class="<?php if($page=='aboutus'){echo 'nav-active';}?>" href="aboutus">Ил тод байдал </a>
                       <ul class="sub-level">
                            <li class="hide"><a class="<?php if($page=='flipbook1'){echo 'nav-active';}?>" href="flipbook1.php">Хууль эрх зүй </a></li>
                            <li class="hide"><a class="<?php if($page=='standards_project'){echo 'nav-active';}?>" href="standards_project.php">Хүний нөөцийн ил тод байдал</a></li>
                            <li class="hide"><a class="<?php if($page=='building1'){echo 'nav-active';}?>" href="building1.php">Үйл ажиллагааны ил тод байдал</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Авилагатай тэмцэх үйл ажиллагаа </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Жендерийн эрх тэгш байдал </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Санхүүгийн нээлттэй мэдээлэл </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Шилэн данс</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Тендер  </a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Тайлан мэдээ</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Ёс зүйн булан</a></li>
                         
                            </ul>
                    </li>
                
                   <li class="hide"><a class="<?php if($page=='index'){echo 'nav-active';}?>" href="index.php">Хотын стандарт</a>
                        <ul class="sub-2">
                            <li class="hide"><a class="<?php if($page=='standard-introduction'){echo 'nav-active';}?>" href="standard-introduction.php">Стандартын танилцуулга</a></li>
                            <li class="hide"><a class="<?php if($page=='standards_project'){echo 'nav-active';}?>" href="standards_project.php">Стандартын төсөл</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Цахим сэтгүүл</a></li>
                            <li class="hide"><a class="<?php if($page=='flipbook'){echo 'nav-active';}?>" href="flipbook.php">Хотын стандарт</a></li>
                           
                            
                            
                             
                             </li> 
                            
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