<?php
// =====================
// Хүсэлтүүдийн PDF каталоги (requests-only, full)
// =====================

// Файл системийн шалгалт (их файлтай үед унтрааж болно)
const FS_CHECKS = true; // false -> хэмжээ/шинэчлэл харуулахгүй

function safe_href($path) {
  $parts = explode('/', $path);
  $parts = array_map('rawurlencode', $parts);
  return implode('/', $parts);
}
function human_filesize($bytes, $decimals = 1) {
  if ($bytes <= 0) return '—';
  $sizes = ['B','KB','MB','GB','TB'];
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $sizes[$factor];
}
function file_meta($path) {
  if (!FS_CHECKS) return ['exists' => null, 'size' => null, 'mtime' => null];
  $exists = file_exists($path);
  return [
    'exists' => $exists,
    'size'   => $exists ? human_filesize(filesize($path)) : 'файл олдсонгүй',
    'mtime'  => $exists ? date('Y.m.d', filemtime($path)) : '—',
  ];
}

// =====================
// Хүсэлтүүдийн жагсаалт (ТАНЫ ОРУУЛСАН ӨГӨГДӨЛ)
// =====================
$requests = [
  [
    'key'   => 'atd_build',
    'title' => 'Барилга, байгууламж барих /АТД/ хүсэлт',
    'desc'  => 'АТД-д хамаарах баримт бичгүүдийг бүрдүүлэхэд ашиглана.',
    'docs'  => [
              [
        'title' => 'Барилга, байгууламж барих хүсэлтийг хүлээн авах',
        'path'  => 'include/flipbook/8. Барилга, байгууламж барих хүсэлтийг хүлээн авах.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Нийслэлийн нутаг дэвсгэрт иргэн, хуулийн этгээдийн санаачилгаар авто зогсоол төлөвлөх хүсэлт',
        'path'  => 'include/flipbook/25. Нийслэлийн нутаг дэвсгэрт иргэн хуулийн этгээдийн санаачилгаар авто зогсоол төлөвлөх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Авто зам, замын байгууламжийн төлөвлөлтийн даалгавар хүсэх хүсэлт',
        'path'  => 'include/flipbook/1. Авто зам, замын байгууламж төлөвлөх даалгавар олгох, батлах.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Нийслэлийн нутаг дэвгэрт иргэн хуулийн этгээдийн санаачилгаар авто зогсоол төлөвлөх хүсэлт',
        'path'  => 'include/flipbook/25. Нийслэлийн нутаг дэвсгэрт иргэн хуулийн этгээдийн санаачилгаар авто зогсоол төлөвлөх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Ашиглалтын шаардлага хангахгүй барилгад даалгавар олгох',
        'path'  => 'include/flipbook/15. УЛААНБААТАР ХОТЫН ОРШИН СУУГЧИЙН ГАРЫН АВЛАГА (1).pdf',
        'desc'  => 'Гарын авлага'
      ],
      [
        'title' => 'Архитектур төлөвлөлтийн даалгаврын схем зургийн эргэлтийн цэгийн солбицол өөрчлүүлэх хүсэлт',
        'path'  => 'include/flipbook/11. Эргэлтийн цэгийн солбилцол өөрчлүүлэх.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Хөрш залгаа эд хөрөнгө өмчлөгчөөс санал авах хуудас',
        'path'  => 'include/flipbook/Хөршийн санал.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],

  [
    'key'   => 'design_approval',
    'title' => 'Загвар зураг батлуулах хүсэлт',
    'desc'  => 'Загвар зургийг батлуулахтай холбоотой маягтууд.',
    'docs'  => [
      [
        'title' => 'Барилгажилтын төслийг (ГХДТ/АШХНОСБ) хянаж, батлуулах',
        'path'  => 'include/flipbook/9. Барилга байгууламжийн загвар зураг зөвшилцөх, батлах.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Барилгын загвар /эскиз/ зургийг хянаж, батлуулах',
        'path'  => 'include/flipbook/9. Барилга байгууламжийн загвар зураг зөвшилцөх, батлах.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Авто зам, замын байгууламжийн загвар зургийг хянаж, батлуулах',
        'path'  => 'include/flipbook/2. Авто зам, замын байгууламжийн загвар зураг зөвшилцөх, батлах.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Гадна тохижилтын ажлын загвар зургийг хянаж, батлуулах',
        'path'  => 'include/flipbook/13. Гадна тохижилтын ажлын загвар зураг батлах хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],

  [
    'key'   => 'construction_permit',
    'title' => 'Барилгын ажлын зөвшөөрөл гэрчилгээний хүсэлт',
    'desc'  => 'Зөвшөөрөл/гэрчилгээ авахад шаардагдах баримтууд.',
    'docs'  => [
      [
        'title' => 'Барилгын ажлын зөвшөөрлийн гэрчилгээ шинээр олгох',
        'path'  => 'include/flipbook/3. Барилгын ажлын зөвшөрлийн хүсэлт.pdf', // ФАЙЛЫН НЭРЭЭ ШАЛГААРАЙ
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Барилгын ажлын зөвшөөрлийн гэрчилгээний хугацаа сунгуулах',
        'path'  => 'include/flipbook/5. Барилгын ажлын зөвшөөрлийн хугацаа сунгуулах.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Барилгын ажлын зөвшөөрлийн гэрчилгээнд нэмэлт өөрчлөлт оруулах',
        'path'  => 'include/flipbook/6. Барилгын ажлын зөвшөөрөлд нэмэлт өөрчлөлт оруулах.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Инженерийн шугам сүлжээний зөвшөөрлийн гэрчилгээ авах',
        'path'  => 'include/flipbook/3. Барилгын ажлын зөвшөрлийн хүсэлт.pdf', // хэрэв тусдаа PDF байвал замыг солино
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Цахилгааны ажлын зөвшөөрлийн гэрчилгээ авах',
        'path'  => 'include/flipbook/4. Цахилгааны ажлын зөвшөөрөл.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Барилга байгууламжийг буулгах ажлын зөвшөөрлийн гэрчилгээ авах',
        'path'  => 'include/flipbook/7. Барилга, байгууламж буулгах ажлын зөвшөөрлийн.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],

  [
    'key'   => 'utility_coord',
    'title' => 'Шугам сүлжээний ажлын зураг зөвшилцөх хүсэлт',
    'desc'  => 'Шугам сүлжээтэй уялдуулсан зургийг зөвшилцөх баримтууд.',
    'docs'  => [
      [
        'title' => 'Инженерийн бэлтгэл арга хэмжээний ажлын зураг төсөл, төлөвлөлтийн шийдэл зөвшилцөх',
        'path'  => 'include/flipbook/21. Инженерийн бэлтгэл арга хэмжээ үерийн далан суваг, зам талбайн борооны ус зайлуулах, хөрсний ус зайлуулах шугам сүлжээний ажлын зураг.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Мэдээлэл холбооны шугам сүлжээний ажлын зураг төсөл, төлөвлөлтийн шийдэл зөвшилцөх',
        'path'  => 'include/flipbook/20. Мэдээлэл холбооны шугам сүлжээний ажлын зураг төсөл зөвшилцөх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Дулаан хангамжийн шугам сүлжээний ажлын зураг төсөл, төлөвлөлтийн шийдэл зөвшилцөх',
        'path'  => 'include/flipbook/18. Дулаан хангамжийн шугам сүлжээний ажлын зураг төсөл зөвшилцөх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Цахилгаан хангамжийн шугам сүлжээний ажлын зураг төсөл, төлөвлөлтийн шийдэл зөвшилцөх',
        'path'  => 'include/flipbook/17. Цахилгаан хангамжийн шугам сүлжээний ажлын зураг төсөл зөвшилцөх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Ус хангамж, ариутгах татуургын шугам сүлжээний ажлын зураг төсөл, төлөвлөлтийн шийдэл зөвшилцөх',
        'path'  => 'include/flipbook/19. Ус хангамж, ариутгах татуургын шугам сүлжээний ажлын зураг төсөл зөвшилцөх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],

  [
    'key'   => 'address_register',
    'title' => 'Барилгад хаяг дугаар олгох, мэдээллийн санд бүртгүүлэх хүсэлт',
    'desc'  => 'Хаягжуулалт, бүртгэлийн маягтууд.',
    'docs'  => [
      [
        'title' => 'Шинээр ашиглалтад орж байгаа барилгад хаяг дугаар шинээр авах',
        'path'  => 'include/flipbook/14. Барилгад хаяг дугаар хүсэх, мэдээллийн санд бүртгэх.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Хуучин барилгад хаяг дугаар олгох',
        'path'  => 'include/flipbook/14. Барилгад хаяг дугаар хүсэх, мэдээллийн санд бүртгэх.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Хуучин хаягтай барилгад дахин тодорхойлолт олгох',
        'path'  => 'include/flipbook/14. Барилгад хаяг дугаар хүсэх, мэдээллийн санд бүртгэх.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'УКА баталгаажсан барилгад дахин тодорхойлолт олгох',
        'path'  => 'include/flipbook/14. Барилгад хаяг дугаар хүсэх, мэдээллийн санд бүртгэх.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Хаяг дугаарын өргөдлийн маягт',
        'path'  => 'include/flipbook/14.  Хаяг дугаарын өргөдлийн маягт.pdf',
        'desc'  => 'Өргөдлийн маягт'
      ],
      [
        'title' => 'Өргөдлийн маягт',
        'path'  => 'include/flipbook/urgudliin mayagt.pdf',
        'desc'  => 'Өргөдлийн маягт'
      ],
    ]
  ],

  [
    'key'   => 'imagery_request',
    'title' => 'Зурган мэдээлэл авах хүсэлт',
    'desc'  => 'Ортофото/зураглалтай холбоотой хүсэлтийн маягт.',
    'docs'  => [
      [
        'title' => 'Инженерийн шугам сүлжээний зурган мэдээлэл авах',
        'path'  => 'include/flipbook/22. Инженерийн шугам сүлжээний зурган мэдээллийн хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Хөгжлийн болон хэсэгчилсэн ерөнхий төлөвлөгөөний зурган мэдээлэл авах',
        'path'  => 'include/flipbook/24. Хөгжлийн Ерөнхий төлөвлөгөөний зурган мэдээлэл авах хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],

  [
    'key'   => 'zero_axis',
    'title' => 'Тэг тэнхлэгийн актыг мэдээллийн санд бүртгэх',
    'desc'  => 'Тэг тэнхлэгийн акт бүртгүүлэхэд шаардлагатай PDF-үүд.',
    'docs'  => [
      [
        'title' => 'Тэг тэнхлэгийн актыг мэдээллийн санд бүртгэх /Инженерийн шугам сүлжээ/',
        'path'  => 'include/flipbook/15. Тэг тэнхлэгийн мэдээллийг хот байгуулалтын мэдээллийн санд бүртгүүлэх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],

  [
    'key'   => 'topo_register',
    'title' => 'Байр зүйн зургийг мэдээллийн санд бүртгэх',
    'desc'  => 'Байр зүйн зураг бүртгэлийн маягтууд.',
    'docs'  => [
      [
        'title' => 'Гүйцэтгэлийн байр зүйн зургийг мэдээллийн санд бүртгүүлэх',
        'path'  => 'include/flipbook/16. Барилга байгууламжийн байр зүйн зургийг хот байгуулалтын мэдээллийн сэнд бүртгүүлэх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
      [
        'title' => 'Барилга, инженерийн байгууламжийн гүйцэтгэлийн зураглалыг шалгаж хүлээн авах (Тоон зургийн таних тэмдэг)',
        'path'  => 'include/flipbook/legend.pdf',
        'desc'  => 'Тоон зургийн таних тэмдэг'
      ],
    ]
  ],

  [
    'key'   => 'passport_eval',
    'title' => 'Паспортжуулалтын дүгнэлт гаргуулах хүсэлт',
    'desc'  => 'Паспортжуулалтын дүгнэлттэй холбоотой баримтууд.',
    'docs'  => [
      // ЖИЧ: Одоогоор байр зүйн бүртгэлийн хүсэлтийн зам байна — та үнэн зөв PDF-ээр солино уу
      [
        'title' => 'Гүйцэтгэлийн байр зүйн зургийг мэдээллийн санд бүртгүүлэх',
        'path'  => 'include/flipbook/16. Барилга байгууламжийн байр зүйн зургийг хот байгуулалтын мэдээллийн сэнд бүртгүүлэх хүсэлт.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],

  [
    'key'   => 'archive_ref',
    'title' => 'Архивын лавлагаа авах хүсэлт',
    'desc'  => 'Архивын лавлагааны хүсэлтийн маягт.',
    'docs'  => [
      [
        'title' => 'Архивын лавлагаа авах хүсэлтийн маягт',
        'path'  => 'include/flipbook/23. Архивын лавлагааны хяналтын хуудас.pdf',
        'desc'  => 'Хүсэлт, маягт'
      ],
    ]
  ],
];

// Идэвхтэй хүсэлтийг тодорхойлох (GET параметр) – байхгүй бол эхнийхийг сонгоно
$active_req_key = isset($_GET['req']) ? preg_replace('/[^a-z0-9_\-]/i', '', $_GET['req']) : '';
$active_index   = 0;
foreach ($requests as $i => $r) {
  if ($r['key'] === $active_req_key) { $active_index = $i; break; }
}
$active_req = $requests[$active_index];

// Бүх хүсэлтүүдийн бүх PDF-ийг хавтгай массив болгоод JS-д дамжуулна
$all_docs = [];
foreach ($requests as $req) {
  $reqTitle = $req['title'] ?? '';
  $reqKey   = $req['key']   ?? '';
  foreach ($req['docs'] as $d) {
    $meta = file_meta($d['path']);
    $all_docs[] = [
      'title'         => $d['title'] ?? '',
      'desc'          => $d['desc']  ?? '',
      'href'          => safe_href($d['path']),
      'size'          => $meta['size'],
      'mtime'         => $meta['mtime'],
      'exists'        => $meta['exists'],
      'request_key'   => $reqKey,
      'request_title' => $reqTitle,
    ];
  }
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($active_req['title']) ?> | Хүсэлтүүдийн PDF каталоги</title>

  <link rel="stylesheet" href="assets/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
  <style>
    :root{--brand:#002672;--muted:#6b7280;--line:#e5e7eb;--bg:#f5f7fb}
    body{color:#0b0b0b;margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif}
    /* Header-т дарагдахгүйн тулд дээрээс хангалттай зай */
    .section-hero{padding:120px 0 40px;background:var(--bg)}
    .section-hero h1{margin:0;font-size:clamp(22px,4vw,34px);font-weight:800}
    .container{max-width:1200px;margin:0 auto;padding:0 16px}

    .tabs{display:flex;gap:8px;flex-wrap:wrap;margin:16px 0 8px}
    .chip{display:inline-flex;align-items:center;gap:8px;border:1px solid var(--line);border-radius:999px;padding:8px 14px;font-size:14px;text-decoration:none;background:#fff;color:#0b0b0b}
    .chip.active{background:var(--brand);color:#fff;border-color:var(--brand)}
    .chip:hover{border-color:#c7d2fe}

    .filters{display:flex;gap:10px;align-items:center;margin:8px 0 0}
    .search{flex:1;min-width:220px;padding:10px 12px;border:1px solid var(--line);border-radius:10px}

    .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px;margin-top:16px}
    .card{background:#fff;border:1px solid var(--line);border-radius:12px;padding:16px;display:flex;flex-direction:column;gap:12px}
    .card h3{margin:0;font-size:18px;line-height:1.35}
    .meta{font-size:13px;color:var(--muted);display:flex;gap:10px;flex-wrap:wrap;align-items:center}
    .actions{display:flex;gap:10px;flex-wrap:wrap}
    .btn{display:inline-flex;align-items:center;gap:8px;border-radius:10px;padding:10px 12px;font-size:14px;text-decoration:none}
    .btn.primary{background:var(--brand);color:#fff}
    .btn.ghost{background:#eef2ff;color:#1e1b4b}

    .empty{grid-column:1/-1;color:#6b7280}
    .badge{margin-left:auto;font-size:12px;padding:2px 8px;border:1px solid var(--line);border-radius:999px}
  </style>

  <!-- PHP -> JS (all docs for global search) -->
  <script>
    const ALL_DOCS = <?php echo json_encode($all_docs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
    const FS_CHECKS = <?= FS_CHECKS ? 'true' : 'false' ?>;
  </script>
</head>
<body>
  <?php if (file_exists('header.php')) include 'header.php'; ?>

  <section class="section-hero" id="name">
    <div class="container">
      <h1>Хүсэлтүүдийн PDF каталоги</h1>

    </div>
  </section>

  <section style="padding:24px 0">
    <div class="container">
              <p style="color:#374151;margin:8px 0 0">Хүсэлт тус бүрийн шаардлагатай PDF-үүдийг эндээс үзэж, татаж авна.</p>
      <div class="filters" role="region" aria-label="Хайлтын шүүлтүүр">
        <input id="q" class="search" type="search" placeholder="Нэрээр хайх… (ж: АТД, Загвар зураг, зөвшөөрөл, хаяг дугаар)">
      </div>
      <!-- Хүсэлт tabs -->
      <div class="tabs" role="tablist" aria-label="Хүсэлтийн төрөл">
        <?php foreach ($requests as $r): $is = ($r['key'] === $active_req['key']); ?>
          <a class="chip <?= $is ? 'active' : '' ?>" href="?req=<?= urlencode($r['key']) ?>" role="tab" aria-selected="<?= $is ? 'true' : 'false' ?>">
            <i class="fa-regular fa-folder-open"></i> <?= htmlspecialchars($r['title']) ?>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- Идэвхтэй хүсэлтийн баримтууд -->
      <h2 id="activeTitle" style="margin:4px 0 6px"><?= htmlspecialchars($active_req['title']) ?></h2>
      <?php if (!empty($active_req['desc'])): ?>
        <p id="activeDesc" style="margin:0 0 12px;color:#475569;font-size:14px;max-width:70ch;"><?= htmlspecialchars($active_req['desc']) ?></p>
      <?php endif; ?>

      <div id="docGrid" class="grid">
        <?php if (empty($active_req['docs'])): ?>
          <div class="empty">Одоогоор PDF бүртгээгүй байна. <span style="color:#374151">(Замыг <code>$requests['docs']</code> дотор нэмнэ үү)</span></div>
        <?php else: ?>
          <?php foreach ($active_req['docs'] as $d): $m = file_meta($d['path']); $href = safe_href($d['path']); ?>
            <article class="card" data-title="<?= htmlspecialchars(mb_strtolower($d['title']), ENT_QUOTES, 'UTF-8') ?>">
              <h3><?= htmlspecialchars($d['title']) ?></h3>
              <?php if (!empty($d['desc'])): ?><p style="margin:0;color:#475569;font-size:14px;"><?= htmlspecialchars($d['desc']) ?></p><?php endif; ?>
              <div class="meta">
                <span><i class="fa-regular fa-file-pdf"></i> PDF</span>
                <?php if (FS_CHECKS): ?>
                  <span><i class="fa-regular fa-hard-drive"></i> <?= $m['size']; ?></span>
                  <span><i class="fa-regular fa-clock"></i> Шинэчлэлт: <?= $m['mtime']; ?></span>
                <?php endif; ?>
                <span class="badge"><?= htmlspecialchars($active_req['title']) ?></span>
              </div>
              <div class="actions">
                <?php if (!$m['exists'] && FS_CHECKS): ?>
                  <div style="color:#dc2626;font-size:14px;"><i class="fa-solid fa-triangle-exclamation"></i> Файл олдсонгүй. Замыг шалгана уу.</div>
                <?php else: ?>
                  <a class="btn primary" href="<?= $href ?>" download="<?= htmlspecialchars($d['download_name'] ?? $d['title'], ENT_QUOTES, 'UTF-8') ?>">
                    <i class="fa-solid fa-download"></i> Татах
                  </a>
                  <a class="btn ghost" href="<?= $href ?>" target="_blank" rel="noopener">
                    <i class="fa-regular fa-eye"></i> Онлайн үзэх
                  </a>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <script>
    // Аюулгүй текст
    function escapeHTML(s){ return (s||'').replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }
    function escapeAttr(s){ return escapeHTML(s).replace(/"/g, '&quot;'); }
    function norm(s){ return (s||'').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,''); }

    // Элементүүд
    const input   = document.getElementById('q');
    const grid    = document.getElementById('docGrid');
    const tabs    = document.querySelector('.tabs');
    const activeTitle = document.getElementById('activeTitle');
    const activeDesc  = document.getElementById('activeDesc');

    // Серверийн анхны HTML (хайлт хоосорвол буцаахад хэрэглэнэ)
    const serverInitialHTML = grid ? grid.innerHTML : '';
    const activeTitleOriginal = activeTitle ? activeTitle.textContent : '';

    function cardHTML(item) {
      const hasMeta = FS_CHECKS;
      const exists  = (item.exists === true || item.exists === null);

      return `
        <article class="card" data-title="${escapeAttr((item.title || '').toLowerCase())}">
          <h3>${escapeHTML(item.title || '')}</h3>
          ${item.desc ? `<p style="margin:0;color:#475569;font-size:14px;">${escapeHTML(item.desc)}</p>` : ''}

          <div class="meta">
            <span><i class="fa-regular fa-file-pdf"></i> PDF</span>
            ${hasMeta ? `
              <span><i class="fa-regular fa-hard-drive"></i> ${escapeHTML(item.size || '—')}</span>
              <span><i class="fa-regular fa-clock"></i> Шинэчлэлт: ${escapeHTML(item.mtime || '—')}</span>
            ` : ''}
            <span class="badge">${escapeHTML(item.request_title || '')}</span>
          </div>

          <div class="actions">
            ${(!exists && hasMeta) ? `
              <div style="color:#dc2626;font-size:14px;">
                <i class="fa-solid fa-triangle-exclamation"></i> Файл олдсонгүй. Замыг шалгана уу.
              </div>
            ` : `
              <a class="btn primary" href="${item.href}" download="${escapeAttr(item.title || 'document')}">
                <i class="fa-solid fa-download"></i> Татах
              </a>
              <a class="btn ghost" href="${item.href}" target="_blank" rel="noopener">
                <i class="fa-regular fa-eye"></i> Онлайн үзэх
              </a>
            `}
          </div>
        </article>
      `;
    }

    function renderList(list, isSearchMode) {
      if (!grid) return;
      if (!list || list.length === 0) {
        grid.innerHTML = `<div class="empty">Илэрц олдсонгүй.</div>`;
      } else {
        grid.innerHTML = list.map(cardHTML).join('');
      }
      if (tabs) tabs.style.display = isSearchMode ? 'none' : '';
      if (activeTitle) activeTitle.textContent = isSearchMode ? 'Хайлтын үр дүн' : activeTitleOriginal;
      if (activeDesc)  activeDesc.style.display = isSearchMode ? 'none' : '';
    }

    // БҮХ PDF-үүдээс хайна (гарчиг, тайлбар, хүсэлтийн нэрээр)
    if (input && grid) {
      input.addEventListener('input', () => {
        const q = norm(input.value.trim());
        if (!q) {
          grid.innerHTML = serverInitialHTML;
          if (tabs) tabs.style.display = '';
          if (activeTitle) activeTitle.textContent = activeTitleOriginal;
          if (activeDesc)  activeDesc.style.display = '';
          return;
        }
        const result = ALL_DOCS.filter(item => {
          const hay = [item.title, item.desc, item.request_title].map(norm).join(' ');
          return hay.includes(q);
        });
        renderList(result, true);
      });
    }
  </script>
</body>
</html>
