<?php
include("app/db/db.php");

if (isset($_GET['id'])) {
    $post = selectOne('post', ['id' => $_GET['id']]);
}

$post_imgs = explode(",", $post['additional_img']);

$other_posts = selectAll('post' . " ORDER BY id DESC LIMIT 8");

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
    <link rel="stylesheet" href="/JSTable-master/dist/jstable.css" />
    <link rel="stylesheet" href="assets/news.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Мэдээ, мэдээлэл |Хот Байгуулалт, Хотын Стандартын Газар</title>
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
            <h2>Мэдээ, мэдээлэл</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хот Байгуулалт, Хотын Стандартын Газар</p>
        </div>
    </section>

    <section id="dynamic-post">
        <div class="container">
            <div class="subcontainer">
                <div class="dynamicpost">
                    <h3 class="post-title"><?php echo $post['title']; ?></h3>
                    <span><?php echo substr($post['date'],0,10); ?></span>
                    <div class="att-img">
                        <img src="include/post_images/<?php echo $post['attach_path']; ?>" alt="">
                    </div>
                    <p><?php echo $post['content']; ?></p>
                    <div class="other-img">
                        <?php foreach($post_imgs as $post_img):?>
                            <div class="img-box">
                                <img src="include/post_images/<?php echo trim($post_img); ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <hr>
                <div class="other-posts">
                    <!--<h3 class="op-title1">Бусад мэдээ</h3>-->
                    <?php foreach($other_posts as $other): ?>
                        <a href="post-page?id=<?php echo $other['id']; ?>">
                            <div class="other-card">
                                <img src="include/post_images/<?php echo $other['attach_path']; ?>" alt="">
                                <div class="other-post-content">
                                    <h3 class="op-title2"><?php echo $other['title']; ?></h3>
                                    <!--<p><?php echo $other['content']; ?></p> -->
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
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
                        <p>72707700</p>
                    </div>
                    <div class="footer-item">
                        <h2>Цахим шуудан</h2>
                        <p>info@uda.ub.gov.mn</p>
                    </div>
                    <div class="footer-item">
                        <h2>Хаяг</h2>
                        <p>Улаанбаатар хотын захиргааны төв цогцолбор, <br> Наадамчдын зам, Хан-Уул</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of footer -->
    
    



    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="assets/script.js"></script>
    <script src="/JSTable-master/dist/jstable.min.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script type="application/javascript">
        function tableSearch(){
            let input, filter, table, tr, td, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("mytable");
            tr = table.getElementsByTagName("tr");
            

            for(let i = 0; i < tr.length; i++){
                td = tr[i].getElementsByTagName("td")[0];
                if(td) {
                    txtValue = td.textContent || td.innerText;
                    if(txtValue.toUpperCase().indexOf(filter) > -1){
                        tr[i].style.display = "";
                    }
                    else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>