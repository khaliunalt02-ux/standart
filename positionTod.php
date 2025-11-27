<?php
$page = 'building1';

/** ---------------- Туслах функцууд ---------------- */
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

/**
 * ---------------- Хэлтсүүдийн өгөгдөл ----------------
 * Доорх байдлаар хэлтэс бүрийн доорх “ажлын байрны тодорхойлолтын” PDF-үүдийг жагсаана.
 * path: сервер дээрх PDF-ийн зам
 * download_name: татах нэр
 */

$departments = [
  'main' => [
    'name' => 'Захиргаа удирдлагын хэлтэс',
    'docs' => [
      [
        'title' => 'Хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/1. HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Хэлтсийн дарга',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Ерөнхий нягтлан бодогч',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/1. UERUNHII NYAGTLAN BODOGCH.pdf',
        'download_name' => 'Тодорхойлолт - Ерөнхий нягтлан бодогч',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Тооцооны нягтлан бодогч',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/2. TOOTSOONII NYAGTLAN BODOGCH.pdf',
        'download_name' => 'Тодорхойлолт - Тооцооны нягтлан бодогч',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хэвлэл мэдээлэл олон гадаад дотоод сургалт хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/3. HEWLEL MEDEELEL OLON GADAAD DOTOOD SURGALT HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Хэвлэл мэдээлэл олон гадаад дотоод сургалт хариуцсан ажилтан',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хүний нөөцийн асуудал хариуцсан ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/3. HUNII NUUTSIIN ASUUDAL HARIUTSAN AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хүний нөөцийн асуудал хариуцсан ахлах мэргэжилтэн',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Үйлчилгээний ажилтан оператор',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/4. UILCHILGEENII AJILTAN OPERATOR.pdf',
        'download_name' => 'Тодорхойлолт - Үйлчилгээний ажилтан оператор',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Газрын даргын шуурхай асуудал дотоод ажил хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/5. GAZRIIN DARGIIN SHUURHAI ASUUDAL DOTOOD AJIL HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Газрын даргын шуурхай асуудал дотоод ажил хариуцсан ажилтан',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Газрын үйл ажиллагааны хэрэгжилт, үр дүнд хийж хяналт шинжилгээ, үнэлгээ  хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/5. GAZRIIN UIL AJILLAGAANII HEREGJIL, UR DUND HIIH HYANALT SHINJILGEE, UNELGEE  HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Газрын үйл ажиллагааны хэрэгжилт, үр дүнд хийж хяналт шинжилгээ, үнэлгээ  хариуцсан мэргэжилтэн',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Архивийн эрхлэгч',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/6. ARHIVIIN ERHLEGCH.pdf',
        'download_name' => 'Тодорхойлолт - Архивийн эрхлэгч',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Бичиг хэргийн ажилтан',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/7. BICHIG HERGIIN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Бичиг хэргийн ажилтан',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Эд хөрөнгийн хариуцагч',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/8. ED HARIUTSAGCH.pdf',
        'download_name' => 'Тодорхойлолт - Эд хөрөнгийн хариуцагч',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Дотоод ажил дотоод хяналт хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/10. DOTOOD AJIL DOTOOD HYANALT HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Дотоод ажил дотоод хяналт хариуцсан ажилтан',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Шуурхай ажил хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/1. ZAHIRGAA UDIRDLAGIIN HELTES/11. SHUURHAI AJIL HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Шуурхай ажил хариуцсан ажилтан',
        'desc' => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'general_arch' => [
    'name' => 'Ерөнхий архитекторын ажлын алба',
    'docs' => [
      [
        'title' => 'Албаны дарга',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/1. ALBANII DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Албаны дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Төсөл хөтөлбөр хариуцсан ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/3. TUSUL HUTULBUR HARIUTSSAN AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Төсөл хөтөлбөр хариуцсан ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Газар зохион байгуулалтын төлөвлөлт хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/6. GAZAR ZOHION BAIGUULALTIIN TULUVLULT HARIUTSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Газар зохион байгуулалтын төлөвлөлт хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хот суурин газрын төлөвлөлт хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/7. HOT SUURIN GAZRIIN TULUVLULTIIN KADSTR HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хот суурин газрын төлөвлөлт хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Ерөнхий архитекторын шуурхай ажил хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/8. ERUNHII ARHITEKTORIIN SHUURHAI AJIL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Ерөнхий архитекторын шуурхай ажил хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хот төлөвлөлтийн эдийн засагч',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/11. HOT TULUWLULTIIN EDIIN ZASAGCH.pdf',
        'download_name' => 'Тодорхойлолт - Хот төлөвлөлтийн эдийн засагч',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хот төлөвлөлтийн баримт бичиг хариуцсан эрх зүйн ажилтан',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/HOT TULUVLULTIIN BARIMT BICHIG HARIUTSSAN ERH ZUIN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Хот төлөвлөлтийн баримт бичиг хариуцсан эрх зүйн ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хотын дизайн хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/HOTIIN DISAIN HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Хотын дизайн хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Мэргэжлийн зөвлөлийн хурал хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/2.ERUNHII ARHITEKTORIIN AJLIIN ALBA/MERGEJLIIN ZUVLULIIN HURAL HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Мэргэжлийн зөвлөлийн хурал хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'building_department' => [
    'name' => 'Барилга хот байгуулалтын хэлтэс',
    'docs' => [
      [
        'title' => 'Барилга хот байгуулалтын хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/3. BARILGA, HOT BAIGUULALTIIN HELTES/1. BARILGA HOT BAIGUULALTIIN HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Барилга хот байгуулалтын хэлтсийн дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/3. BARILGA, HOT BAIGUULALTIIN HELTES/2. AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хот байгууалт хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/3. BARILGA, HOT BAIGUULALTIIN HELTES/3. HOT BAIGUULALT HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хот байгууалт хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Газрын харилцааны асуудал хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/3. BARILGA, HOT BAIGUULALTIIN HELTES/4. GAZRIIN HARILTSAANII ASUUDAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Газрын харилцааны асуудал хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'urban_planning' => [
    'name' => 'Хот төлөвлөлтын хэлтэс',
    'docs' => [
      [
        'title' => 'Хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/4. HOT TULUVLULTIIN HELTES/1. HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Хэлтсийн дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/4. HOT TULUVLULTIIN HELTES/2. AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хот байгууалт хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/4. HOT TULUVLULTIIN HELTES/3. HOT BAIGUULALT HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хот байгууалт хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Газрын харилцааны асуудал хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/4. HOT TULUVLULTIIN HELTES/4. GAZRIIN HARILTSAANII ASUUDAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Газрын харилцааны асуудал хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хот байгуулалтийн судалгаа хариуцсан архитектор',
        'path'  => 'include/alban_tushaal/4. HOT TULUVLULTIIN HELTES/HOT BAIGUULALTIIN SUDALGAA HARIUTSSAN ARHITEKTOR.pdf',
        'download_name' => 'Тодорхойлолт - Хот байгуулалт судалгаа хариуцсан архитектор',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'barilga_quality' => [
    'name' => 'Барилга байгууламжийн чанар стандартын хэлтэс',
    'docs' => [
      [
        'title' => 'Хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/7.BARILGA BAIGUULAMJIIN CHANAR STANDARTIIN HELTES/1. BARILGA BAIGUULAMJIIN CHANARIIN HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Хэлтсийн дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/7.BARILGA BAIGUULAMJIIN CHANAR STANDARTIIN HELTES/2. AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Барилгын чанар, аюулгүй байдал хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/7.BARILGA BAIGUULAMJIIN CHANAR STANDARTIIN HELTES/3. BARILGIIN CHANAR AYULGUI BAIDAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Барилгын чанар, аюулгүй байдал хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Газрын зохион байгуулалт хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/7.BARILGA BAIGUULAMJIIN CHANAR STANDARTIIN HELTES/17. GAZAR ZOHION BAIGUULALT HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Газрын зохион байгуулалт хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Дэд бүтэц хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/7.BARILGA BAIGUULAMJIIN CHANAR STANDARTIIN HELTES/18. DED BUTETS HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Дэд бүтэц хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'infrastructure_planning' => [
    'name' => 'Хот байгуулалтын инженерын дэд бүтцийн төлөвлөлтийн хэлтэс',
    'docs' => [
      [
        'title' => 'Замын хөдөлгөөн төлөвлөлт хариуцсан инженер',
        'path'  => 'include/alban_tushaal/5.HOT BAIGUULALTIIN INJENERIIN DED BUTTSIIN MULUWLULTIIN HELTES/12. ZAMIIN HUDULGUUN TULUWLULT HARIUTSSAN INJENER.pdf',
        'download_name' => 'Тодорхойлолт - Замын хөдөлгөөн төлөвлөлт хариуцсан инженер',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Газар зохион байгуулалт геодези зураг зүйн асуудал хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/5.HOT BAIGUULALTIIN INJENERIIN DED BUTTSIIN MULUWLULTIIN HELTES/14. GAZAR ZOHION BAIGUULALT GEODEZI ZURAG ZUIN ASUUDAL HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Газар зохион байгуулалт геодези зураг зүйн асуудал хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Дэд бүтцийн төлөвлөлтийн эдийн засагч',
        'path'  => 'include/alban_tushaal/5.HOT BAIGUULALTIIN INJENERIIN DED BUTTSIIN MULUWLULTIIN HELTES/13. DED BUTTSIIN TULUWLULTIIN EDIIN ZASAGCH.pdf',
        'download_name' => 'Тодорхойлолт - Дэд бүтцийн төлөвлөлтийн эдийн засагч',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'hot_baiguulalt_hyanalt' => [
    'name' => 'Хот байгуулалтын хяналтын хэлтэс',
    'docs' => [
      [
        'title' => 'Хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/11. HOT BAIGUULALTIIN HYANALTIIN HELTES/1. HOT BAIGUULALTIIN INGENERIIN BELTGEL8 HYANALTIIN HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Хэлтсийн дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/11. HOT BAIGUULALTIIN HYANALTIIN HELTES/2. AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хот байгуулалт хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/11. HOT BAIGUULALTIIN HYANALTIIN HELTES/3. HOT BAIGUULAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хот байгуулалт хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Инженерийн бэлтгэл арга хэмжээ хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/11. HOT BAIGUULALTIIN HYANALTIIN HELTES/4. INGENERIIN BELTGEL ARGA HEMJEE HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Инженерийн бэлтгэл арга хэмжээ хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Геодези, зураг зүйн асуудал хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/11. HOT BAIGUULALTIIN HYANALTIIN HELTES/5. GEODEZI ZURAG ZUIN ASUUDAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Геодези, зураг зүйн асуудал хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хөдөлмөр хамгаалал, аюулгүй байдал хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/11. HOT BAIGUULALTIIN HYANALTIIN HELTES/6. HUDULMUR HAMGAALAL, AYULGUI BAIDAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хөдөлмөр хамгаалал, аюулгүй байдал хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Эрчим хүчний инженер',
        'path'  => 'include/alban_tushaal/11. HOT BAIGUULALTIIN HYANALTIIN HELTES/ERCHIM HUCHNII INGENER.pdf',
        'download_name' => 'Тодорхойлолт - Эрчим хүчний инженер',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'ded_tuv_daguul' => [
    'name' => 'Дэд төв, дагуул хотын хөгжлийн хэлтэс',
    'docs' => [
      [
        'title' => 'Орон зайн дүн шинжилгээ хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/9. DED TUW DAGUUL HOTIIN HUGJLIIN HELTES/19. ORON ZAIN DUN SHINJILGEE HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Орон зайн дүн шинжилгээ хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Дагуул хотын хуулийн асуудал хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/9. DED TUW DAGUUL HOTIIN HUGJLIIN HELTES/20. DAGUUL HOTIIN HUULIIN ASUUDAL HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Дагуул хотын хуулийн асуудал хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Тээвэр, ложистикийн төлөвлөлт хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/9. DED TUW DAGUUL HOTIIN HUGJLIIN HELTES/21. TEEWER LOJISTIKIIN TULUWLULT HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Тээвэр, ложистикийн төлөвлөлт хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Төлөвлөлт, судалгаа хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/9. DED TUW DAGUUL HOTIIN HUGJLIIN HELTES/TULUVLULT SUDALGAA HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Төлөвлөлт, судалгаа хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'dotood_hyanalt_huuli' => [
    'name' => 'Дотоод хяналт, хуулийн хэлтэс',
    'docs' => [
      [
        'title' => 'Хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/10. DOTOOD HYANALT, HUULIIN HELTES/1. DOTOOD HAYANALT HUULIIN HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Хэлтсийн дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Эрх зүйн асуудал хариуцсан ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/10. DOTOOD HYANALT, HUULIIN HELTES/2. ERKH ZUIN ASUUDAL HARIUTSSAN AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Эрх зүйн асуудал хариуцсан ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Дотоод хяналт хариуцсан ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/10. DOTOOD HYANALT, HUULIIN HELTES/3. DOTOOD HYANALT HARIUTSSAN AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Дотоод хяналт хариуцсан ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хууль тогтоомжийн хэрэгжилт, эрх зүйн маргааны асуудал хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/10. DOTOOD HYANALT, HUULIIN HELTES/4. HUULI TOGTOOMJIIN HEREGJILT, ERH ZUIN MARGAANII ASUUDAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хууль тогтоомжийн хэрэгжилт, эрх зүйн маргааны асуудал хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Дотоод хяналт хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/10. DOTOOD HYANALT, HUULIIN HELTES/5. DOTOOD HYANALT HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Дотоод хяналт хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Гэрээний эрх зүйн мэргэжилтэн',
        'path'  => 'include/alban_tushaal/10. DOTOOD HYANALT, HUULIIN HELTES/6. GEREE ERKH ZUIN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Гэрээний эрх зүйн мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'injener_dedbutets' => [
    'name' => 'Инженерийн дэд бүтцийн төлөвлөлтийн хэлтэс',
    'docs' => [
      [
        'title' => 'Хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/1. HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Хэлтсийн дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/2. AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Дулаан хангамж хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/3. DULAAN HANGAMJ HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Дулаан хангамж хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Цахилгаан хангамж хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/4. TSAHILGAAN HANGAMJ HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Цахилгаан хангамж хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Сэргээгдэх эрчим хүч хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/5. SERGEEGDEH ERCHIM HUCH HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Сэргээгдэх эрчим хүч хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Мэдээлэл, харилцаа холбоо хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/6. MEDEELEL HARILTSAA HOLBOO HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Мэдээлэл, харилцаа холбоо хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Усан хангамж, ариутгах татуурга хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/7. USAN HANGAMJ ARIUTGAH TATUURGA HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Усан хангамж, ариутгах татуурга хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Усны барилга байгууламж хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/8. USNII BARILGA BAIGUULAMJ HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Усны барилга байгууламж хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Хийн хангамж хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/8. INJENERIIN DED BUTSSIIN TULUVLULTIIN HELTES/9. HIIN HANGAMJ HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Хийн хангамж хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],

  'gis_it' => [
    'name' => 'Хотын орон зайн мэдээлэл технологийн хэлтэс',
    'docs' => [
      [
        'title' => 'Хэлтсийн дарга',
        'path'  => 'include/alban_tushaal/6. HOTIIN ORON ZAIN MEDEELEL TEHNOLOGIIN HELTES/1. HELTSIIN DARGA.pdf',
        'download_name' => 'Тодорхойлолт - Хэлтсийн дарга',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Орон зайн мэдээлэлийн сан хариуцсан ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/6. HOTIIN ORON ZAIN MEDEELEL TEHNOLOGIIN HELTES/2. ORON ZAIN MEDEELLIIN SAN HARIUTSSAN AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Орон зайн мэдээлэлийн сан хариуцсан ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Цахим шилжилт хариуцсан ахлах мэргэжилтэн',
        'path'  => 'include/alban_tushaal/6. HOTIIN ORON ZAIN MEDEELEL TEHNOLOGIIN HELTES/3. TSAHIM SHILJILT HARIUTSSAN AHLAH MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Цахим шилжилт хариуцсан ахлах мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Геодези зураг зүйн асуудал хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/6. HOTIIN ORON ZAIN MEDEELEL TEHNOLOGIIN HELTES/4. GEODEZI ZURAG ZUIN ASUUDAL HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Геодези зураг зүйн асуудал хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Программ хангамж хариуцсан мэргэжилтэн',
        'path'  => 'include/alban_tushaal/6. HOTIIN ORON ZAIN MEDEELEL TEHNOLOGIIN HELTES/7. PROGRAMM HANGAMJ HARIUTSSAN MERGEJILTEN.pdf',
        'download_name' => 'Тодорхойлолт - Программ хангамж хариуцсан мэргэжилтэн',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Мэдээлэл технологийн ажилтан',
        'path'  => 'include/alban_tushaal/6. HOTIIN ORON ZAIN MEDEELEL TEHNOLOGIIN HELTES/15. MEDEELEL TEHNOLOGIIN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Мэдээлэл технологийн ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
      [
        'title' => 'Зураглал байрзүйн мэдээллийн сан хариуцсан ажилтан',
        'path'  => 'include/alban_tushaal/6. HOTIIN ORON ZAIN MEDEELEL TEHNOLOGIIN HELTES/16. ZURAGLAL BAIRZUIN MEDEELLIIN SAN HARIUTSSAN AJILTAN.pdf',
        'download_name' => 'Тодорхойлолт - Зураглал байрзүйн мэдээллийн сан хариуцсан ажилтан',
        'desc'  => 'Албан тушаалын тодорхойлолт'
      ],
    ]
  ],
];


/** Аль хэлтсийг сонгосон бэ? (fallback: эхний key) */
$dept_keys = array_keys($departments);
$active_dept = isset($_GET['dept']) && isset($departments[$_GET['dept']]) ? $_GET['dept'] : $dept_keys[0];

?><!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($departments[$active_dept]['name']) ?> | Хот байгуулалт, хотын стандартын газар</title>

  <link rel="stylesheet" href="assets/main.css">
  <link rel="stylesheet" href="assets/contact.css">
  <link rel="stylesheet" href="assets/flipbook.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">

  <style>
    .section-hero{padding:48px 0;background:#f5f7fb}
    .section-hero h1{margin:0;font-size:clamp(24px,4vw,36px);font-weight:800}
    .container{max-width:1100px;margin:0 auto;padding:0 16px}

    /* Дээд талын хэлтэс сонгох (tabs) */
    .dept-tabs{display:flex;gap:8px;flex-wrap:wrap;margin:16px 0 8px}
    .dept-tab{display:inline-flex;align-items:center;gap:8px;border:1px solid #e5e7eb;border-radius:999px;padding:8px 14px;font-size:14px;text-decoration:none;background:#fff;color:#0b0b0b}
    .dept-tab.active{background:#002672;color:#fff;border-color:#002672}
    .dept-tab:hover{border-color:#c7d2fe}

    /* Жагсаалт (карт) */
    .doc-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px;margin-top:16px}
    .doc-card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:16px;display:flex;flex-direction:column;gap:12px}
    .doc-card h3{margin:0;font-size:18px;line-height:1.35}
    .doc-meta{font-size:13px;color:#6b7280;display:flex;gap:10px;flex-wrap:wrap}
    .doc-actions{display:flex;gap:10px;flex-wrap:wrap}
    .btn{display:inline-flex;align-items:center;gap:8px;border-radius:10px;padding:10px 12px;font-size:14px;text-decoration:none}
    .btn-primary{background:#002672;color:#fff}
    .btn-ghost{background:#eef2ff;color:#1e1b4b}

    /* Жижиг шүүлтүүр хайлт (optional) */
    .filter-row{display:flex;gap:10px;align-items:center;margin:8px 0 0}
    .filter-input{flex:1;min-width:200px;padding:10px 12px;border:1px solid #e5e7eb;border-radius:10px}
  </style>
</head>
<body>
  <?php include("header.php"); ?>

  <!-- Гарчиг -->
  <section class="section-hero" id="name">
    <div class="container">
      <h1>Албан тушаалын тодорхойлолт</h1>

      <!-- Хайлт (клиент тал) -->
      <!--<div class="filter-row">-->
      <!--  <input id="filterInput" class="filter-input" type="search" placeholder="Албан тушаалын нэрээр шүүх… (ж: нягтлан, дарга, оператор)">-->
      <!--</div>-->
    </div>
  </section>

  <!-- Идэвхтэй хэлтсийн баримтууд -->
  <section style="padding:24px 0">
            

    <div class="container">
        <div class="dept-tabs" role="tablist" aria-label="Хэлтсүүд">
        <?php foreach ($departments as $key => $dept): ?>
          <?php
            // JS байхгүй үед ч ажиллах линк
            $link = '?dept=' . urlencode($key);
            $is_active = ($key === $active_dept);
          ?>
          <a class="dept-tab <?= $is_active ? 'active' : '' ?>" href="<?= $link ?>" role="tab" aria-selected="<?= $is_active ? 'true' : 'false' ?>">
            <i class="fa-regular fa-building"></i> <?= htmlspecialchars($dept['name']) ?>
          </a>
        <?php endforeach; ?>
      </div>
      <h2 style="margin:0 0 8px"><?= htmlspecialchars($departments[$active_dept]['name']) ?></h2>
      <div id="docGrid" class="doc-grid">
        <?php
          $docs = $departments[$active_dept]['docs'] ?? [];
          if (empty($docs)):
        ?>
          <div style="grid-column:1/-1;color:#6b7280">Одоогоор баримт бүртгээгүй байна.</div>
        <?php
          else:
            foreach ($docs as $d):
              $exists = file_exists($d['path']);
              $href   = safe_href($d['path']);
              $size   = $exists ? human_filesize(filesize($d['path'])) : 'файл олдсонгүй';
              $mtime  = $exists ? date('Y.m.d', filemtime($d['path'])) : '—';
        ?>
          <article class="doc-card" data-title="<?= htmlspecialchars(mb_strtolower($d['title']), ENT_QUOTES, 'UTF-8'); ?>">
            <h3><?= htmlspecialchars($d['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <?php if(!empty($d['desc'])): ?>
              <p style="margin:0;color:#475569;font-size:14px;"><?= htmlspecialchars($d['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <div class="doc-meta">
              <span><i class="fa-regular fa-file-pdf"></i> PDF</span>
              <span><i class="fa-regular fa-hard-drive"></i> <?= $size; ?></span>
              <span><i class="fa-regular fa-clock"></i> Шинэчлэлт: <?= $mtime; ?></span>
            </div>
            <div class="doc-actions">
              <?php if ($exists): ?>
                <a class="btn btn-primary" href="<?= $href; ?>" download="<?= htmlspecialchars($d['download_name'] ?? $d['title'], ENT_QUOTES, 'UTF-8'); ?>">
                  <i class="fa-solid fa-download"></i> Татах
                </a>
                <a class="btn btn-ghost" href="<?= $href; ?>" target="_blank" rel="noopener">
                  <i class="fa-regular fa-eye"></i> Онлайн үзэх
                </a>
              <?php else: ?>
                <div style="color:#dc2626;font-size:14px;">
                  <i class="fa-solid fa-triangle-exclamation"></i> Файл олдсонгүй. Замыг шалгана уу.
                </div>
              <?php endif; ?>
            </div>
          </article>
        <?php
            endforeach;
          endif;
        ?>
      </div>
    </div>
  </section>

  <!-- Скрипт: хайлт, табын хурдан солилт (optional, progressive enhancement) -->
  <script>
    // Хайлт: гарчиг дотроос агшин зуур шүүнэ
    const input = document.getElementById('filterInput');
    const grid  = document.getElementById('docGrid');
    if (input && grid) {
      input.addEventListener('input', () => {
        const q = input.value.trim().toLowerCase();
        grid.querySelectorAll('.doc-card').forEach(card => {
          const title = card.getAttribute('data-title') || '';
          card.style.display = title.includes(q) ? '' : 'none';
        });
      });
    }

    // Хэрэв хүсвэл дээд tabs-ыг history.pushState ашиглан SPA мэт болгоно:
    // (Линк дарахад хуудсаа дахин ачаалуулахгүйгээр dept параметр өөрчлөх— OPTIONAL)
    document.querySelectorAll('.dept-tab').forEach(tab => {
      tab.addEventListener('click', (e) => {
        // зөвхөн нэг домэйн дээр ажиллуулъя
        if (e.metaKey || e.ctrlKey || e.shiftKey) return; // шинэ таб гэх мэт оролцоог хүндэтгье
        e.preventDefault();
        const url = new URL(tab.href, window.location.origin);
        // Хуудас дахин ачаалж сэрээхгүй гэж үзвэл эндээс AJAX ачаалж болно.
        // Одоохондоо query-р reload хийлгэе (энгийн, найдвартай):
        window.location.href = url.toString();
      });
    });
  </script>

  <!-- Танай өмнөх скриптүүд (хэрэглэвэл) -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="okzoom/Lightweight-Image-Inner-Zoom-Magnifier-Plugin-For-jQuery-okzoom//src/okzoom.js"></script>
  <script src="assets/flipbook.js" defer></script>
  <script src="assets/flipbook2.js" defer></script>
  <script src="assets/flipbook3.js" defer></script>
</body>
</html>
