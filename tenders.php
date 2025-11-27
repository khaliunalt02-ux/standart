<?php
$page = 'building1';

// === Тендерийн жагсаалтын массив ===
$tenders = [
    [
        'path'  => 'include/tenders/20250509.pdf',
        'title' => 'Тендерийн баримт бичиг – 2025/05/09',
        'desc'  => 'Барилга угсралтын ажил'
    ],
    [
        'path'  => 'include/tenders/20250922.pdf',
        'title' => 'Тендерийн баримт бичиг – 2025/09/22',
        'desc'  => 'Засвар үйлчилгээний ажил'
    ],
];

$firstPdf = $tenders[0]['path'] ?? '';
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тендерийн бичиг баримт (PDF)</title>
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/contact.css">
    <link rel="stylesheet" href="assets/flipbook.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .tender-layout { display:grid; grid-template-columns:320px 1fr; gap:16px; }
        .tender-panel { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:12px; }
        .tender-list { list-style:none; margin:0; padding:0; }
        .tender-item { padding:10px; border-radius:10px; cursor:pointer; margin-bottom:8px; }
        .tender-item:hover { background:#f3f4f6; }
        .tender-item[aria-current="true"] { background:#e5f0ff; border:1px solid #3b82f6; }
        .tender-title { font-size:14px; font-weight:600; }
        .tender-desc { font-size:12px; color:#6b7280; }
        .viewer { background:#fff; border:1px solid #e5e7eb; border-radius:12px; display:flex; flex-direction:column; min-height:75vh; }
        .viewer-bar { display:flex; justify-content:space-between; align-items:center; padding:10px; border-bottom:1px solid #e5e7eb; background:#fafafa; border-radius:12px 12px 0 0; }
        .viewer-actions { display:flex; gap:8px; }
        .btn { border:1px solid #d1d5db; background:#fff; padding:6px 12px; border-radius:8px; cursor:pointer; font-size:14px; }
        .btn.primary { background:#0f62fe; color:#fff; border-color:#0f62fe; }
        .viewer-frame { flex:1; }
        .viewer-frame iframe { width:100%; height:100%; border:none; }
        @media(max-width:900px){ .tender-layout { grid-template-columns:1fr; } }
    </style>
</head>
<body>

<!-- navbar -->
<?php include("header.php"); ?>
<!-- end navbar -->

<section id="name">
  <div class="container">
    <div class="banner-container">
      <div class="name">
        <h1>Тендерийн бичиг баримт</h1>
      </div>
    </div>
  </div>
</section>

<section id="intro1">
  <div class="container">
      <div class="subcontainer">
    <div class="tender-layout">
      <!-- Зүүн жагсаалт -->
      <aside class="tender-panel">
        <h3>Тендерийн жагсаалт</h3>
        <ul id="tenderList" class="tender-list">
          <?php foreach ($tenders as $idx => $t): ?>
            <li class="tender-item" tabindex="0"
                data-path="<?php echo htmlspecialchars($t['path']); ?>"
                aria-current="<?php echo $idx===0 ? 'true':'false'; ?>">
              <span class="tender-title"><?php echo htmlspecialchars($t['title']); ?></span><br>
              <span class="tender-desc"><?php echo htmlspecialchars($t['desc']); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </aside>

      <!-- Баруун viewer -->
      <div class="viewer">
        <div class="viewer-bar">
          <div class="viewer-actions">
            <button id="btnPrev" class="btn"><i class="fa-solid fa-chevron-left"></i> Өмнөх</button>
            <button id="btnNext" class="btn">Дараах <i class="fa-solid fa-chevron-right"></i></button>
          </div>
          <div class="viewer-actions">
            <a id="btnOpen" class="btn" target="_blank">Шинэ цонх</a>
            <a id="btnDownload" class="btn primary" download>Татах</a>
          </div>
        </div>
        <div class="viewer-frame">
          <?php if ($firstPdf): ?>
            <iframe id="pdfFrame" src="<?php echo htmlspecialchars($firstPdf); ?>"></iframe>
          <?php else: ?>
            <p style="padding:20px;">PDF байхгүй байна.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
     </div>
  </div>
</section>

<script>
const items = document.querySelectorAll('.tender-item');
const frame = document.getElementById('pdfFrame');
const btnOpen = document.getElementById('btnOpen');
const btnDownload = document.getElementById('btnDownload');
function setActive(el){
  items.forEach(i => i.setAttribute('aria-current','false'));
  el.setAttribute('aria-current','true');
  const path = el.getAttribute('data-path');
  frame.src = path + '#toolbar=1&view=FitH';
  btnOpen.href = path;
  btnDownload.href = path;
}
items.forEach(el => el.addEventListener('click', ()=> setActive(el)));
document.getElementById('btnPrev').onclick = ()=> {
  let i = [...items].findIndex(el => el.getAttribute('aria-current')==='true');
  if(i>0) setActive(items[i-1]);
};
document.getElementById('btnNext').onclick = ()=> {
  let i = [...items].findIndex(el => el.getAttribute('aria-current')==='true');
  if(i<items.length-1) setActive(items[i+1]);
};
</script>

</body>
</html>
