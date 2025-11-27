<?php
include("app/db/db.php");

$bb22comms = selectAll('commission_bb_22' . " ORDER BY id DESC");
$zt22comms = selectAll('commission_zt_22' . " ORDER BY id DESC");


$page = 'services';

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
    <link rel="stylesheet" href="assets/commission.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Мэргэжлийн зөвлөлийн хурал | Хот байгуулалт, хотын стандартын газар</title>
</head>

<body>

    <!-- navbar -->
    <?php
    include("header.php")
    ?>
    <!-- end of navbar -->

    <!-- content -->
    <section class="contact-section">
        <div class="contact-bg">
            <!-- <h3>Мэргэжлийн зөвлөлийн хурал</h3> -->
            <h2>Мэргэжлийн зөвлөлийн хурал</h2>
            <div class="line">
                <div></div>
                <!-- <div></div>
            <div></div> -->
            </div>
            <p class="text">Хот байгуулалт, хотын стандартын газар</p>
        </div>
    </section>

    <section id="commission">
        <div class="container">
            <!--<div class="filter-container">-->
            <!--    <div class="filter-item barilga" data-filter="barilga"><span>Мэргэжлийн зөвлөлиин хурлын жагсаалт</span></div>-->
            <!--    <div class="filter-item zasvar" data-filter="zasvar"><span>Мэргэжлийн зөвлөлиин хурлын санал</span></div>-->
            <!--</div> -->
            <div class="subcontainer">
                <div class="com-content">
                    <div class="bb">
                        <table>
                            <tr class="">
                                <td class="filter-items barilga">
                                    <div data-filter="barilga"><span>Мэргэжлийн зөвлөлиин хурлын жагсаалт</span></div>
                                </td>
                                <td class="filter-items zasvar">
                                    <div data-filter="zasvar"><span>Мэргэжлийн зөвлөлиин хурлын санал</span></div>
                                </td>
                            </tr>
                            <?php foreach ($bb22comms as $bb22comm): ?>
                                <tr>
                                    <td>
                                        <a href="commission-one?id=<?php echo $bb22comm['id']; ?>">
                                            <div class="com-card">
                                                <div class="week">
                                                    <span><?php echo $bb22comm['date_range']; ?></span>
                                                </div>
                                                <!--<div class="approved">Баталсан: <?php echo $bb22comm['date_approved']; ?></div>-->
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="include/commission22_bb/<?php echo $bb22comm['decision_path']; ?>" target="_blank">
                                            <div class="com-card">
                                                <div class="week">
                                                    <span><?php echo $bb22comm['decision_name']; ?></span>
                                                </div>
                                                <!--<div class="approved">Баталсан: <?php echo $bb22comm['date_approved']; ?></div>-->
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="zsh data">
                        <ul>
                            <?php foreach ($zt22comms as $zt22comm): ?>
                                <li>
                                    <a href="commission-one-zt?id=<?php echo $zt22comm['id']; ?>">
                                        <div class="com-card">
                                            <div class="week"><span><?php echo $zt22comm['date_range']; ?></span></div>
                                            <!--<div class="approved">Баталсан: <?php echo $zt22comm['date_approved']; ?></div>-->
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
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
                        <p>Улаанбаатар хотын Захиргааны төв цогцолбор, <br> Наадамчдын зам-1201, Хан-Уул дүүрэг, Улаанбаатар хот</p>
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