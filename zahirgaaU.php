<?php
// =====================
// Хүсэлтүүдийн PDF каталоги (requests-only)
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
// Хүсэлтүүдийн жагсаалт
//  — path-уудыг бодит замаар нь СОЛЬЖ бөглөнө үү.
//  — "docs" массивт тухайн хүсэлтэд шаардагдах PDF-үүдийг жагсаана.
// =====================
$requests = [
  [
    'key'   => 'atd_build',
    'title' => 'Барилга, байгууламж барих /АТД/ хүсэлт',
    'desc'  => 'АТД-д хамаарах баримт бичгүүдийг бүрдүүлэхэд ашиглана.',
    'docs'  => [
      // ['title' => 'Маягт АТД-01', 'path' => 'include/requests/ATD/ATD-01.pdf', 'desc' => 'Өргөдөл, маягт'],
      // ['title' => 'Зураг төсөл (PDF)', 'path' => 'include/requests/ATD/design.pdf'],
    ]
  ],
  [
    'key'   => 'design_approval',
    'title' => 'Загвар зураг батлуулах хүсэлт',
    'desc'  => 'Загвар зургийг батлуулахтай холбоотой маягтууд.',
    'docs'  => []
  ],
  [
    'key'   => 'construction_permit',
    'title' => 'Барилгын ажлын зөвшөөрөл гэрчилгээний хүсэлт',
    'desc'  => 'Зөвшөөрөл/гэрчилгээ авахад шаардагдах баримтууд.',
    'docs'  => []
  ],
  [
    'key'   => 'utility_coord',
    'title' => 'Шугам сүлжээний ажлын зураг зөвшилцөх хүсэлт',
    'desc'  => 'Шугам сүлжээтэй уялдуулсан зургийг зөвшилцөх баримтууд.',
    'docs'  => []
  ],
  [
    'key'   => 'address_register',
    'title' => 'Барилгад хаяг дугаар олгох, мэдээллийн санд бүртгүүлэх хүсэлт',
    'desc'  => 'Хаягжуулалт, бүртгэлийн маягтууд.',
    'docs'  => []
  ],
  [
    'key'   => 'imagery_request',
    'title' => 'Зурган мэдээлэл авах хүсэлт',
    'desc'  => 'Ортофото/зураглалтай холбоотой хүсэлтийн маягт.',
    'docs'  => []
  ],
  [
    'key'   => 'zero_axis',
    'title' => 'Тэг тэнхлэгийн актыг мэдээллийн санд бүртгэх',
    'desc'  => 'Тэг тэнхлэгийн акт бүртгүүлэхэд шаардлагатай PDF-үүд.',
    'docs'  => []
  ],
  [
    'key'   => 'topo_register',
    'title' => 'Байр зүйн зургийг мэдээллийн санд бүртгэх',
    'desc'  => 'Байр зүйн зураг бүртгэлийн маягтууд.',
    'docs'  => []
  ],
  [
    'key'   => 'passport_eval',
    'title' => 'Паспортжуулалтын дүгнэлт гаргуулах хүсэлт',
    'desc'  => 'Паспортжуулалтын дүгнэлттэй холбоотой баримтууд.',
    'docs'  => []
  ],
  [
    'key'   => 'archive_ref',
    'title' => 'Архивын лавлагаа авах хүсэлт',
    'desc'  => 'Архивын лавлагааны хүсэлтийн маягт.',
    'docs'  => []
  ],
];

// Идэвхтэй хүсэлтийг тодорхойлох (GET параметр) – байхгүй бол эхнийхийг сонгоно
$active_req_key = isset($_GET['req']) ? preg_replace('/[^a-z0-9_\-]/i', '', $_GET['req']) : '';
$active_index   = 0;
foreach ($requests as $i => $r) {
  if ($r['key'] === $active_req_key) { $active_index = $i; break; }
}
$active_req = $requests[$active_index];

?><!DOCTYPE html>
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
    .section-hero{padding:40px 0;background:var(--bg)}
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
    .meta{font-size:13px;color:var(--muted);display:flex;gap:10px;flex-wrap:wrap}
    .actions{display:flex;gap:10px;flex-wrap:wrap}
    .btn{display:inline-flex;align-items:center;gap:8px;border-radius:10px;padding:10px 12px;font-size:14px;text-decoration:none}
    .btn.primary{background:var(--brand);color:#fff}
    .btn.ghost{background:#eef2ff;color:#1e1b4b}

    .empty{grid-column:1/-1;color:#6b7280}
  </style>
</head>
<body>
  <?php if (file_exists('header.php')) include 'header.php'; ?>
  
      <section id="name">
        <div class="container">
            <div class="banner-container">
                <div class="name">
                    <!-- <span class="sub-title">Нийслэлийн Засаг Даргын Хэрэгжүүлэгч Агентлаг</span> -->
                     <h1>Хүсэлтүүдийн PDF каталоги</h>
                    <!-- <h1><span></span></h1> -->
                </div>
            </div>
        </div>
    </section>

<section class="section-hero">
  <div class="container">

      Хүсэлт тус бүрийн шаардлагатай PDF-үүдийг эндээс үзэж, татаж авна.
    </p>
    <div class="filters">
      <input id="q" class="search" type="search" placeholder="Нэрээр хайх… (ж: АТД, Загвар зураг, зөвшөөрөл, хаяг дугаар)">
    </div>
  </div>
</section>

  <section style="padding:24px 0">
    <div class="container">
      <!-- Хүсэлт tabs -->
      <div class="tabs" role="tablist" aria-label="Хүсэлтийн төрөл">
        <?php foreach ($requests as $r): $is = ($r['key'] === $active_req['key']); ?>
          <a class="chip <?= $is ? 'active' : '' ?>" href="?req=<?= urlencode($r['key']) ?>" role="tab" aria-selected="<?= $is ? 'true' : 'false' ?>">
            <i class="fa-regular fa-folder-open"></i> <?= htmlspecialchars($r['title']) ?>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- Идэвхтэй хүсэлтийн баримтууд -->
      <h2 style="margin:4px 0 6px"><?= htmlspecialchars($active_req['title']) ?></h2>
      <?php if (!empty($active_req['desc'])): ?>
        <p style="margin:0 0 12px;color:#475569;font-size:14px;max-width:70ch;"><?= htmlspecialchars($active_req['desc']) ?></p>
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
    // Хайлт (картаас нэрээр шүүх)
    const input = document.getElementById('q');
    const grid  = document.getElementById('docGrid');
    if (input && grid) {
      input.addEventListener('input', () => {
        const q = input.value.trim().toLowerCase();
        grid.querySelectorAll('.card').forEach(card => {
          const title = card.getAttribute('data-title') || '';
          card.style.display = title.includes(q) ? '' : 'none';
        });
      });
    }
  </script>
</body>
</html>
