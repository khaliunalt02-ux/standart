<?php
$page = 'building1';
?>
<!DOCTYPE html>
<html lang="mn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Ирсэн, Явуулсан бичгийн мэдээ | Хот байгуулалт, хотын стандартын газар</title>
    <style>
.pdf-grid {
  display: grid;
  /* card-уудыг тогтмол өргөнтэй болгоно (жишээ нь 260px).
     Дэлгэц багасахад автоматаар баганаа цөөрүүлнэ. */
  grid-template-columns: repeat(auto-fit, minmax(260px, 260px));

  gap: 16px;

  /* grid блокыг өөрөө дундаа байрлуулах */
  margin: 20px auto;
  justify-content: center;

  /* grid-ийн нийт өргөнийг хязгаарлаад дундаа “блок” болгоно */
  max-width: 1000px;
  box-sizing: border-box;
}

h2.section-title {
  margin-top: 40px;
  margin-bottom: 20px;
  color: #222;
  text-align: center;
}

.pdf-card {
  padding: 16px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background: #fafafa;
  text-align: center;
  transition: all 0.2s ease;
}

.pdf-card:hover {
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  transform: translateY(-3px);
}

.pdf-card h3 {
  font-size: 16px;
  margin-bottom: 12px;
  color: #333;
}

.pdf-card a {
  display: inline-block;
  margin-top: 8px;
  padding: 6px 12px;
  background: #0066cc;
  color: #fff;
  border-radius: 4px;
  text-decoration: none;
  font-size: 14px;
}

.pdf-card a:hover {
  background: #004999;
}
    </style>
</head>

<body>

    <!-- navbar -->
    <?php include("header.php") ?>
    <!-- end of navbar -->

    <!-- banner -->
    <section id="name">
        <div class="container">
            <div class="banner-container">
                <div class="name">
                    <h1>📑 Ирсэн, Явуулсан бичгийн мэдээ</h1>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Ирсэн бичиг
    $incoming = [
        ["title" => "2025 оны 01 сар", "path" => "include/alban_bichig/irsen/2025.01.pdf"],
        ["title" => "2025 оны 02 сар", "path" => "include/alban_bichig/irsen/2025.02.pdf"],
        ["title" => "2025 оны 03 сар", "path" => "include/alban_bichig/irsen/2025.03.pdf"],
        ["title" => "2025 оны 04 сар", "path" => "include/alban_bichig/irsen/2025.04.pdf"],
        ["title" => "2025 оны 05 сар", "path" => "include/alban_bichig/irsen/2025.05.pdf"],
        ["title" => "2025 оны 06 сар", "path" => "include/alban_bichig/irsen/2025.06.pdf"],
        ["title" => "2025 оны 07 сар", "path" => "include/alban_bichig/irsen/2025.07.pdf"],
        ["title" => "2025 оны 08 сар", "path" => "include/alban_bichig/irsen/2025.08.pdf"],
        ["title" => "2025 оны 09 сар", "path" => "include/alban_bichig/irsen/2025.09.pdf"],
        ["title" => "2025 оны 10 сар", "path" => "include/alban_bichig/irsen/2025.10.pdf"],
        
    ];

    // Явуулсан бичиг
    $outgoing = [
        ["title" => "2025 оны 01 сар", "path" => "include/alban_bichig/ywsan/2025.01.pdf"],
        ["title" => "2025 оны 02 сар", "path" => "include/alban_bichig/ywsan/2025.02.pdf"],
        ["title" => "2025 оны 03 сар", "path" => "include/alban_bichig/ywsan/2025.03.pdf"],
        ["title" => "2025 оны 04 сар", "path" => "include/alban_bichig/ywsan/2025.04.pdf"],
        ["title" => "2025 оны 05 сар", "path" => "include/alban_bichig/ywsan/2025.05.pdf"],
        ["title" => "2025 оны 06 сар", "path" => "include/alban_bichig/ywsan/2025.06.pdf"],
        ["title" => "2025 оны 07 сар", "path" => "include/alban_bichig/ywsan/2025.07.pdf"],
        ["title" => "2025 оны 08 сар", "path" => "include/alban_bichig/ywsan/2025.08.pdf"],
        ["title" => "2025 оны 09 сар", "path" => "include/alban_bichig/ywsan/2025.09.pdf"],
        ["title" => "2025 оны 10 сар", "path" => "include/alban_bichig/ywsan/2025.10.pdf"],
    ];
    ?>

    <!-- Ирсэн бичгийн мэдээ -->
<section id="incoming">
    <div class="container">
        <h2 class="section-title">📥 Ирсэн бичгийн мэдээ</h2>
        <div class="pdf-grid">
            <?php foreach ($incoming as $file) { ?>
                <div class="pdf-card">
                    <h3><?php echo $file['title']; ?></h3>
                    <a href="<?php echo $file['path']; ?>" target="_blank">
                        <i class="fa-solid fa-file-pdf"></i> Нээх
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

    <!-- Явуулсан бичгийн мэдээ -->
    <section id="outgoing">
        <div class="container">
            <h2 class="section-title">📤 Явуулсан бичгийн мэдээ</h2>
            <div class="pdf-grid">
                <?php foreach ($outgoing as $file) { ?>
                    <div class="pdf-card">
                        <h3><?php echo $file['title']; ?></h3>
                        <a href="<?php echo $file['path']; ?>" target="_blank">
                            <i class="fa-solid fa-file-pdf"></i> Нээх
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

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
                        <p>Улаанбаатар Хотын Захиргааны төв цогцолбор,<br>Наадамчдын зам, Хан-Уул</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of footer -->

</body>
</html>
