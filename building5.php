<?php
$page = 'building1';

// 1) Файлын систем дээрх хавтас (үүнийг өөрчлөхгүй)
$tenderDir = __DIR__ . '/include/tenders';

// 2) Вэб дээр харагдах URL суурь замыг баримтын үндсэн root-оос тооцоолж авна
$webBase = rtrim(str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath($tenderDir)), '/');

// 3) PDF-үүдийг унших (өргөтгөлийн case-ийг хамруулах)
$tenders = [];
if (is_dir($tenderDir)) {
    foreach (glob($tenderDir . '/*.{pdf,PDF}', GLOB_BRACE) as $path) {
        $fname = basename($path);

        // Вэб-ийн зөв URL: /.../include/tenders/%D0%A2%D0%91%D0%91%2020250509.pdf
        $href  = $webBase . '/' . rawurlencode($fname);

        $title = preg_replace('/[_-]+/', ' ', preg_replace('/\.(pdf|PDF)$/', '', $fname));
        preg_match('/^(20\d{2}-\d{2}-\d{2})/', $fname, $m);
        $date = $m[1] ?? '';

        $tenders[] = ['title'=>trim($title), 'date'=>$date, 'href'=>$href];
    }
    usort($tenders, function($a,$b){
        if ($a['date'] && $b['date'] && $a['date'] !== $b['date']) return strcmp($b['date'],$a['date']);
        return strcasecmp($a['title'],$b['title']);
    });
}
$firstPdf = $tenders[0]['href'] ?? '';
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/contact.css">
    <link rel="stylesheet" href="assets/flipbook.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Тендерийн бичиг баримт (PDF) | Хот байгуулалт, хотын стандартын газар</title>
    <style>
        /* Хуудасны минимал layout */
        .tender-layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 16px;
        }
        .tender-panel {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 12px;
            max-height: 75vh;
            overflow: auto;
        }
        .tender-search {
            display: flex; gap: 8px; align-items: center; margin-bottom: 8px;
        }
        .tender-search input[type="search"]{
            width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 10px;
        }
        .tender-list { list-style: none; margin: 0; padding: 0; }
        .tender-item {
            display: flex; flex-direction: column; gap: 4px;
            padding: 10px; border-radius: 10px; cursor: pointer;
        }
        .tender-item:hover { background: #f3f4f6; }
        .tender-item[aria-current="true"] { background: #e5f0ff; outline: 2px solid #cfe2ff; }
        .tender-title { font-size: 14px; color: #111827; font-weight: 600; }
        .tender-meta { font-size: 12px; color: #6b7280; }
        .viewer {
            background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; display: flex; flex-direction: column; min-height: 75vh;
        }
        .viewer-bar {
            display: flex; gap: 8px; align-items: center; justify-content: space-between;
            padding: 10px 12px; border-bottom: 1px solid #e5e7eb; background: #fafafa; border-radius: 12px 12px 0 0;
        }
        .viewer-actions { display: flex; gap: 8px; align-items: center; }
        .btn {
            appearance: none; border: 1px solid #d1d5db; background: #fff; padding: 8px 12px; border-radius: 10px; cursor: pointer; font-size: 14px;
        }
        .btn:hover { background: #f9fafb; }
        .btn.primary { background: #0f62fe; color: #fff; border-color: #0f62fe; }
        .btn.primary:hover { filter: brightness(0.95); }
        .viewer-frame { flex: 1; min-height: 60vh; }
        .viewer-frame iframe { width: 100%; height: 100%; border: none; border-radius: 0 0 12px 12px; }
        @media (max-width: 980px){
            .tender-layout { grid-template-columns: 1fr; }
            .tender-panel { max-height: unset; }
        }
    </style>
</head>
<body>

    <!-- navbar -->
    <?php include("header.php"); ?>
    <!-- end of navbar -->

    <!-- content -->
    <section id="name">
        <div class="container">
            <div class="banner-container">
                <div class="name">
                    <h1>Тендерийн бичиг баримт<span></span></h1>
                </div>
            </div>
        </div>
    </section> 

    <section id="intro1">
        <div class="container">
            <div class="subcontainer">
                <div class="standard-name">
                    <h3>Тендерийн жагсаалт ба PDF үзлэг</h3>
                </div>
                <div class="standard-info">
                    <p>Эндээс тендерийн баримтуудыг хайж, сонгон PDF хэлбэрээр үзнэ үү. Файлуудыг <code>include/tenders/</code> хавтсанд байрлуулна.</p>
                </div>

                <div class="tender-layout" role="region" aria-label="Тендерийн бичиг баримтын хэсэг">
                    <!-- Зүүн самбар: жагсаалт -->
                    <aside class="tender-panel" aria-label="Тендерийн жагсаалт">
                        <div class="tender-search">
                            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                            <input id="tenderSearch" type="search" placeholder="Нэрээр хайх… (ж: зам, тохижилт, 2025-08)">
                        </div>
                        <ul id="tenderList" class="tender-list">
                            <?php if (!empty($tenders)): ?>
                                <?php foreach ($tenders as $idx => $t): ?>
                                    <li class="tender-item" tabindex="0"
                                        data-href="<?php echo htmlspecialchars($t['href']); ?>"
                                        aria-current="<?php echo $idx===0 ? 'true':'false'; ?>">
                                        <span class="tender-title"><?php echo htmlspecialchars($t['title']); ?></span>
                                        <?php if ($t['date']): ?>
                                            <span class="tender-meta"><i class="fa-regular fa-calendar"></i> <?php echo htmlspecialchars($t['date']); ?></span>
                                        <?php endif; ?>
                                        <span class="tender-meta"><i class="fa-regular fa-file-pdf"></i> PDF</span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="tender-item" aria-disabled="true">
                                    <span class="tender-title">Одоогоор PDF олдсонгүй.</span>
                                    <span class="tender-meta">`include/tenders/` хавтсанд PDF байрлуулна уу.</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </aside>

                    <!-- Баруун тал: viewer -->
                    <div class="viewer" aria-label="PDF үзэгч">
                        <div class="viewer-bar">
                            <div class="viewer-actions">
                                <button id="btnPrev" class="btn" title="Өмнөх (↑/PgUp)">
                                    <i class="fa-solid fa-circle-chevron-left"></i> Өмнөх
                                </button>
                                <button id="btnNext" class="btn" title="Дараах (↓/PgDn)">
                                    Дараах <i class="fa-solid fa-circle-chevron-right"></i>
                                </button>
                            </div>
