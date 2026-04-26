<?php
// save.php — Menerima POST data, simpan JSON, lalu generate ulang HTML dokumentasi

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Pastikan folder data ada
if (!is_dir('data')) {
    mkdir('data', 0755, true);
}

// Sanitasi & ambil semua field
function s($key, $default = '') {
    return isset($_POST[$key]) ? htmlspecialchars(strip_tags($_POST[$key]), ENT_QUOTES, 'UTF-8') : $default;
}
function sRaw($key, $default = '') {
    return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
}

$data = [
    // Meta
    'brand_name'        => s('brand_name', 'MAXIM'),
    'ds_version'        => s('ds_version', 'v1.0.0'),
    'figma_file'        => s('figma_file', 'MAXIM-WEBSITE'),
    'framework'         => s('framework', 'React + Tailwind'),

    // Colors
    'color_background'  => s('color_background', '#FDF5EB'),
    'color_primer'      => s('color_primer', '#8B3734'),
    'color_dark'        => s('color_dark', '#000000'),
    'color_light'       => s('color_light', '#FFFFFF'),
    'color_bg_desc'     => s('color_bg_desc', ''),
    'color_primer_desc' => s('color_primer_desc', ''),
    'color_dark_desc'   => s('color_dark_desc', ''),
    'color_light_desc'  => s('color_light_desc', ''),

    // Typography
    'font_primary'      => s('font_primary', 'Roboto'),
    'font_secondary'    => s('font_secondary', 'Inter'),
    'h1_size'           => s('h1_size', '75'),
    'h1_weight'         => s('h1_weight', '600'),
    'h4_size'           => s('h4_size', '24'),
    'h4_weight'         => s('h4_weight', '400'),
    'h5_size'           => s('h5_size', '20'),
    'h5_weight'         => s('h5_weight', '400'),
    'logo_size'         => s('logo_size', '32'),
    'logo_weight'       => s('logo_weight', '700'),
    'btn_size'          => s('btn_size', '24'),
    'btn_weight'        => s('btn_weight', '400'),

    // Spacing
    'page_width'        => s('page_width', '1280'),
    'content_width'     => s('content_width', '1160'),
    'page_padding_h'    => s('page_padding_h', '60'),
    'section_gap'       => s('section_gap', '80'),
    'card_gap'          => s('card_gap', '11'),
    'btn_padding_h'     => s('btn_padding_h', '32'),
    'btn_padding_v'     => s('btn_padding_v', '17'),
    'nav_item_gap'      => s('nav_item_gap', '40'),

    // Border Radius
    'radius_button'     => s('radius_button', '15'),
    'radius_image_sm'   => s('radius_image_sm', '27'),
    'radius_image_lg'   => s('radius_image_lg', '36'),

    // Components
    'navbar_logo'       => s('navbar_logo', 'maxim hair'),
    'navbar_links'      => sRaw('navbar_links', "submit photos\nfree consult\nchat now\nwhatsApp"),
    'btn_label_lg'      => s('btn_label_lg', 'More Before & After'),
    'btn_label_md'      => s('btn_label_md', 'Free Consult'),
    'btn_label_sm'      => s('btn_label_sm', 'Get Directions'),

    // Do & Don't
    'do_dont_1_do'      => s('do_dont_1_do', ''),
    'do_dont_1_dont'    => s('do_dont_1_dont', ''),

    // Changelog
    'changelog'         => sRaw('changelog', ''),
    'contribution_note' => s('contribution_note', ''),
];

// Icons (7 items)
for ($i = 0; $i < 7; $i++) {
    $data["icon_token_$i"] = s("icon_token_$i", '');
    $data["icon_ctx_$i"]   = s("icon_ctx_$i", '');
    $data["icon_sz_$i"]    = s("icon_sz_$i", '');
}

// Simpan JSON
file_put_contents('data/design-system.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// ═══════════════════════════════════════════════
// Generate HTML dokumentasi
// ═══════════════════════════════════════════════
$d = $data;

// Parse navbar links
$navLinks = array_filter(array_map('trim', explode("\n", $d['navbar_links'])));

// Parse changelog
$changelogRows = array_filter(array_map('trim', explode("\n", $d['changelog'])));

// Parse icons
$icons = [];
for ($i = 0; $i < 7; $i++) {
    if (!empty($data["icon_token_$i"])) {
        $icons[] = [
            'token' => $data["icon_token_$i"],
            'ctx'   => $data["icon_ctx_$i"],
            'sz'    => $data["icon_sz_$i"],
        ];
    }
}

// Weight label
function weightLabel($w) {
    $map = ['300'=>'Light','400'=>'Regular','500'=>'Medium','600'=>'SemiBold','700'=>'Bold','800'=>'ExtraBold'];
    return $map[$w] ?? $w;
}

// Spacing tokens table
$spacingTokens = [
    ['token'=>'spacing.page-width',    'value'=>$d['page_width'].'px',     'desc'=>'Lebar maksimum halaman',           'use'=>'w-['.$d['page_width'].'px]'],
    ['token'=>'spacing.content-width', 'value'=>$d['content_width'].'px',  'desc'=>'Lebar konten inner',               'use'=>'w-['.$d['content_width'].'px]'],
    ['token'=>'spacing.page-padding-h','value'=>$d['page_padding_h'].'px', 'desc'=>'Padding kiri & kanan halaman',     'use'=>'px-['.$d['page_padding_h'].'px]'],
    ['token'=>'spacing.section-gap',   'value'=>$d['section_gap'].'px',    'desc'=>'Jarak vertikal antar section',     'use'=>'py-['.$d['section_gap'].'px]'],
    ['token'=>'spacing.card-gap',      'value'=>$d['card_gap'].'px',       'desc'=>'Jarak antar kartu dalam grid',     'use'=>'gap-['.$d['card_gap'].'px]'],
    ['token'=>'spacing.btn-padding-h', 'value'=>$d['btn_padding_h'].'px',  'desc'=>'Padding horizontal tombol besar',  'use'=>'px-['.$d['btn_padding_h'].'px]'],
    ['token'=>'spacing.btn-padding-v', 'value'=>$d['btn_padding_v'].'px',  'desc'=>'Padding vertikal tombol besar',    'use'=>'py-['.$d['btn_padding_v'].'px]'],
    ['token'=>'spacing.nav-item-gap',  'value'=>$d['nav_item_gap'].'px',   'desc'=>'Jarak antar item navigasi',        'use'=>'gap-['.$d['nav_item_gap'].'px]'],
];

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?= $d['brand_name'] ?> — Design System <?= $d['ds_version'] ?></title>
<link href="https://fonts.googleapis.com/css2?family=<?= urlencode($d['font_primary']) ?>:wght@300;400;500;600;700&family=<?= urlencode($d['font_secondary']) ?>:wght@300;400;500&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
:root{
  --color-background:<?= $d['color_background'] ?>;
  --color-primer:<?= $d['color_primer'] ?>;
  --color-primer-dark:<?= $d['color_primer'] ?>;
  --color-dark:<?= $d['color_dark'] ?>;
  --color-light:<?= $d['color_light'] ?>;
  --doc-bg:#0f0f0f;
  --doc-surface:#161616;
  --doc-border:#2a2a2a;
  --doc-muted:#666;
  --doc-text:#e8e8e8;
  --doc-accent:<?= $d['color_primer'] ?>;
  --font-brand:'<?= $d['font_primary'] ?>',sans-serif;
  --font-body:'<?= $d['font_secondary'] ?>',sans-serif;
  --font-mono:'DM Mono',monospace;
}
html{scroll-behavior:smooth;}
body{font-family:var(--font-body);background:var(--doc-bg);color:var(--doc-text);line-height:1.6;font-size:14px;}
.layout{display:flex;min-height:100vh;}
.sidebar{width:240px;min-width:240px;background:var(--doc-surface);border-right:1px solid var(--doc-border);position:sticky;top:0;height:100vh;overflow-y:auto;padding:24px 0 40px;display:flex;flex-direction:column;gap:2px;}
.sidebar-logo{padding:0 24px 24px;border-bottom:1px solid var(--doc-border);margin-bottom:12px;}
.sidebar-logo .brand{font-family:var(--font-brand);font-weight:700;font-size:18px;color:var(--color-background);letter-spacing:1px;text-transform:uppercase;}
.sidebar-logo .version{font-size:11px;color:var(--doc-muted);margin-top:2px;font-family:var(--font-mono);}
.sidebar-section-label{padding:16px 24px 6px;font-size:10px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:var(--doc-muted);}
.sidebar-link{display:flex;align-items:center;gap:10px;padding:9px 24px;font-size:13px;color:#aaa;text-decoration:none;border-left:2px solid transparent;transition:all .15s;}
.sidebar-link:hover,.sidebar-link.active{color:var(--color-background);border-left-color:var(--doc-accent);background:rgba(139,55,52,.08);}
.sidebar-link .dot{width:6px;height:6px;border-radius:50%;background:var(--doc-muted);flex-shrink:0;transition:background .15s;}
.sidebar-link:hover .dot,.sidebar-link.active .dot{background:var(--doc-accent);}
.main{flex:1;overflow-y:auto;padding:64px 64px 80px;max-width:960px;}
.section{margin-bottom:80px;scroll-margin-top:32px;}
.section-header{display:flex;align-items:center;gap:12px;margin-bottom:32px;padding-bottom:14px;border-bottom:1px solid var(--doc-border);}
.section-number{font-family:var(--font-mono);font-size:11px;color:var(--doc-accent);background:rgba(139,55,52,.12);padding:2px 8px;border-radius:4px;border:1px solid rgba(139,55,52,.3);}
.section-title{font-family:var(--font-brand);font-size:22px;font-weight:600;color:var(--color-background);}
.section-desc{color:var(--doc-muted);margin-bottom:32px;font-size:13px;line-height:1.7;max-width:600px;}
.doc-hero{background:linear-gradient(135deg,#1a0c0b 0%,#0f0f0f 60%);border:1px solid var(--doc-border);border-radius:16px;padding:48px;margin-bottom:64px;position:relative;overflow:hidden;}
.doc-hero::before{content:'';position:absolute;top:-80px;right:-80px;width:300px;height:300px;background:radial-gradient(circle,rgba(139,55,52,.15) 0%,transparent 70%);pointer-events:none;}
.doc-hero .eyebrow{font-family:var(--font-mono);font-size:11px;letter-spacing:3px;text-transform:uppercase;color:var(--doc-accent);margin-bottom:12px;}
.doc-hero h1{font-family:var(--font-brand);font-size:40px;font-weight:700;color:var(--color-background);line-height:1.1;margin-bottom:12px;}
.doc-hero p{color:var(--doc-muted);font-size:14px;max-width:480px;line-height:1.7;}
.doc-hero .meta-row{display:flex;gap:24px;margin-top:32px;padding-top:24px;border-top:1px solid var(--doc-border);}
.meta-item{display:flex;flex-direction:column;gap:2px;}
.meta-label{font-size:10px;color:var(--doc-muted);text-transform:uppercase;letter-spacing:1px;}
.meta-value{font-family:var(--font-mono);font-size:12px;color:var(--color-background);}
.card{background:var(--doc-surface);border:1px solid var(--doc-border);border-radius:12px;overflow:hidden;margin-bottom:16px;}
.card-header{padding:12px 18px;border-bottom:1px solid var(--doc-border);display:flex;align-items:center;justify-content:space-between;background:rgba(255,255,255,.02);}
.card-title{font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:1.5px;color:var(--doc-muted);}
.badge{font-family:var(--font-mono);font-size:10px;padding:2px 8px;border-radius:100px;background:rgba(255,255,255,.05);color:var(--doc-muted);border:1px solid var(--doc-border);}
.badge.green{background:rgba(34,197,94,.1);color:#4ade80;border-color:rgba(34,197,94,.2);}
.color-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;padding:18px;}
.color-swatch{border-radius:10px;border:1px solid var(--doc-border);overflow:hidden;cursor:pointer;transition:transform .15s,box-shadow .15s;}
.color-swatch:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(0,0,0,.4);}
.swatch-block{height:80px;}
.swatch-meta{padding:10px 14px;background:rgba(0,0,0,.3);}
.swatch-token{font-family:var(--font-mono);font-size:11px;color:var(--doc-accent);}
.swatch-hex{font-family:var(--font-mono);font-size:13px;color:var(--color-background);font-weight:500;}
.swatch-desc{font-size:11px;color:var(--doc-muted);margin-top:2px;}
.type-grid{padding:24px;display:flex;flex-direction:column;gap:1px;}
.type-row{display:grid;grid-template-columns:140px 1fr 180px;align-items:center;gap:24px;padding:20px 16px;border-radius:8px;transition:background .15s;}
.type-row:hover{background:rgba(255,255,255,.03);}
.type-label{font-family:var(--font-mono);font-size:11px;color:var(--doc-accent);}
.type-preview{color:var(--color-background);}
.type-specs{display:flex;flex-direction:column;gap:3px;align-items:flex-end;}
.type-spec-item{font-family:var(--font-mono);font-size:10px;color:var(--doc-muted);background:rgba(255,255,255,.04);padding:2px 6px;border-radius:4px;}
.usage-table{width:100%;border-collapse:collapse;}
.usage-table th{text-align:left;padding:10px 16px;font-size:10px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--doc-muted);border-bottom:1px solid var(--doc-border);background:rgba(255,255,255,.02);}
.usage-table td{padding:12px 16px;font-size:12px;border-bottom:1px solid rgba(255,255,255,.04);vertical-align:top;}
.usage-table tr:hover td{background:rgba(255,255,255,.02);}
.usage-table .mono{font-family:var(--font-mono);font-size:11px;color:var(--doc-accent);}
.component-preview{background:var(--color-background);padding:40px;display:flex;align-items:center;justify-content:center;gap:24px;flex-wrap:wrap;min-height:120px;}
.do-dont-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
.do-card,.dont-card{border-radius:12px;overflow:hidden;border:1px solid;}
.do-card{border-color:rgba(34,197,94,.2);}
.dont-card{border-color:rgba(239,68,68,.2);}
.do-card .tag,.dont-card .tag{padding:10px 16px;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;}
.do-card .tag{background:rgba(34,197,94,.1);color:#4ade80;}
.dont-card .tag{background:rgba(239,68,68,.1);color:#f87171;}
.do-card .preview,.dont-card .preview{background:var(--color-background);padding:32px;display:flex;align-items:center;justify-content:center;}
.do-card .note,.dont-card .note{padding:14px;font-size:12px;color:var(--doc-muted);background:var(--doc-surface);border-top:1px solid var(--doc-border);}
.changelog-list{padding:24px;display:flex;flex-direction:column;gap:1px;}
.changelog-entry{display:flex;gap:24px;padding:18px 0;border-bottom:1px solid rgba(255,255,255,.05);}
.changelog-entry:last-child{border-bottom:none;}
.cl-version{font-family:var(--font-mono);font-size:12px;color:var(--doc-accent);min-width:60px;font-weight:500;}
.cl-date{font-size:11px;color:var(--doc-muted);min-width:100px;}
.cl-desc{font-size:13px;color:var(--doc-text);}
.pill{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:100px;font-size:10px;font-weight:600;letter-spacing:1px;text-transform:uppercase;}
.pill-stable{background:rgba(34,197,94,.1);color:#4ade80;border:1px solid rgba(34,197,94,.2);}
.pill-beta{background:rgba(251,191,36,.1);color:#fbbf24;border:1px solid rgba(251,191,36,.2);}
.spacing-list{padding:24px;display:flex;flex-direction:column;gap:12px;}
.spacing-row{display:grid;grid-template-columns:220px 1fr 80px;align-items:center;gap:24px;padding:12px 0;border-bottom:1px solid rgba(255,255,255,.04);}
.spacing-row:last-child{border-bottom:none;}
.spacing-token{font-family:var(--font-mono);font-size:12px;color:var(--doc-accent);}
.spacing-desc{font-size:12px;color:var(--doc-muted);}
.spacing-bar-wrap{display:flex;align-items:center;gap:12px;}
.spacing-bar{height:6px;background:linear-gradient(90deg,var(--doc-accent),rgba(139,55,52,.4));border-radius:3px;}
.spacing-value{font-family:var(--font-mono);font-size:11px;color:var(--doc-muted);min-width:36px;text-align:right;}
.code-block{background:#0a0a0a;border:1px solid var(--doc-border);border-radius:0 0 12px 12px;padding:24px;font-family:var(--font-mono);font-size:12px;line-height:1.7;overflow-x:auto;color:#ccc;}
.code-block .ck{color:#7ec8e3;} .code-block .cv{color:#8B3734;} .code-block .cs{color:#a8d8a8;} .code-block .cc{color:#555;font-style:italic;}
.edit-btn{position:fixed;bottom:32px;right:32px;background:var(--doc-accent);color:#fff;padding:14px 24px;border-radius:12px;text-decoration:none;font-family:var(--font-body);font-size:13px;font-weight:600;display:flex;align-items:center;gap:8px;box-shadow:0 8px 24px rgba(139,55,52,.4);transition:all .2s;}
.edit-btn:hover{transform:translateY(-2px);box-shadow:0 12px 32px rgba(139,55,52,.5);}
::-webkit-scrollbar{width:6px;height:6px;}
::-webkit-scrollbar-track{background:transparent;}
::-webkit-scrollbar-thumb{background:#333;border-radius:3px;}
</style>
</head>
<body>
<div class="layout">

<!-- SIDEBAR -->
<nav class="sidebar">
  <div class="sidebar-logo">
    <div class="brand"><?= $d['brand_name'] ?></div>
    <div class="version">Design System · <?= $d['ds_version'] ?></div>
  </div>
  <span class="sidebar-section-label">Foundation</span>
  <a href="#overview"   class="sidebar-link active"><span class="dot"></span>Overview</a>
  <a href="#colors"     class="sidebar-link"><span class="dot"></span>Color Tokens</a>
  <a href="#typography" class="sidebar-link"><span class="dot"></span>Typography</a>
  <a href="#spacing"    class="sidebar-link"><span class="dot"></span>Spacing &amp; Sizing</a>
  <a href="#radius"     class="sidebar-link"><span class="dot"></span>Border Radius</a>
  <span class="sidebar-section-label">Components</span>
  <a href="#buttons"    class="sidebar-link"><span class="dot"></span>Buttons</a>
  <a href="#navbar"     class="sidebar-link"><span class="dot"></span>Navbar</a>
  <a href="#icons"      class="sidebar-link"><span class="dot"></span>Icons</a>
  <span class="sidebar-section-label">Guidelines</span>
  <a href="#dodont"     class="sidebar-link"><span class="dot"></span>Do &amp; Don't</a>
  <a href="#usage"      class="sidebar-link"><span class="dot"></span>Token Usage</a>
  <a href="#changelog"  class="sidebar-link"><span class="dot"></span>Changelog</a>
</nav>

<!-- MAIN -->
<main class="main">

  <!-- HERO -->
  <div class="doc-hero" id="overview">
    <div class="eyebrow">Design System Documentation</div>
    <h1><?= $d['brand_name'] ?> Hair<br>Design System</h1>
    <p>A single source of truth for designers and developers. All design decisions — color, typography, spacing, components — documented here for consistency across every touchpoint.</p>
    <div class="meta-row">
      <div class="meta-item"><span class="meta-label">Version</span><span class="meta-value"><?= $d['ds_version'] ?></span></div>
      <div class="meta-item"><span class="meta-label">Figma File</span><span class="meta-value"><?= $d['figma_file'] ?></span></div>
      <div class="meta-item"><span class="meta-label">Framework</span><span class="meta-value"><?= $d['framework'] ?></span></div>
      <div class="meta-item"><span class="meta-label">Status</span><span class="meta-value">Stable</span></div>
    </div>
  </div>

  <!-- 01 COLORS -->
  <section class="section" id="colors">
    <div class="section-header">
      <span class="section-number">01</span>
      <h2 class="section-title">Color Tokens</h2>
    </div>
    <p class="section-desc">Semua warna didefinisikan sebagai token. Selalu referensikan token — jangan gunakan hex secara langsung di kode.</p>
    <div class="card">
      <div class="card-header"><span class="card-title">Brand Palette</span><span class="badge green">4 tokens</span></div>
      <div class="color-grid">
        <?php
        $colorSwatches = [
            ['token'=>'color.background', 'hex'=>$d['color_background'], 'desc'=>$d['color_bg_desc']],
            ['token'=>'color.primer',     'hex'=>$d['color_primer'],     'desc'=>$d['color_primer_desc']],
            ['token'=>'color.dark',       'hex'=>$d['color_dark'],       'desc'=>$d['color_dark_desc']],
            ['token'=>'color.light',      'hex'=>$d['color_light'],      'desc'=>$d['color_light_desc']],
        ];
        foreach ($colorSwatches as $cs): ?>
        <div class="color-swatch">
          <div class="swatch-block" style="background:<?= $cs['hex'] ?>;<?= $cs['hex']==='#FFFFFF'?'border-bottom:1px solid #333;':'' ?>"></div>
          <div class="swatch-meta">
            <div class="swatch-token"><?= $cs['token'] ?></div>
            <div class="swatch-hex"><?= $cs['hex'] ?></div>
            <div class="swatch-desc"><?= $cs['desc'] ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="card">
      <div class="card-header"><span class="card-title">CSS Custom Properties</span><span class="badge">globals.css</span></div>
      <div class="code-block"><span class="cc">/* globals.css */</span>
<span class="ck">:root</span> {
  <span class="ck">--color-background</span>: <span class="cs"><?= $d['color_background'] ?></span>;
  <span class="ck">--color-primer</span>:     <span class="cs"><?= $d['color_primer'] ?></span>;
  <span class="ck">--color-dark</span>:       <span class="cs"><?= $d['color_dark'] ?></span>;
  <span class="ck">--color-light</span>:      <span class="cs"><?= $d['color_light'] ?></span>;
}</div>
    </div>
  </section>

  <!-- 02 TYPOGRAPHY -->
  <section class="section" id="typography">
    <div class="section-header">
      <span class="section-number">02</span>
      <h2 class="section-title">Typography</h2>
    </div>
    <p class="section-desc">Dua font family: <strong style="color:#e8e8e8"><?= $d['font_primary'] ?></strong> sebagai brand font utama, <strong style="color:#e8e8e8"><?= $d['font_secondary'] ?></strong> sebagai font sekunder.</p>
    <div class="card">
      <div class="card-header"><span class="card-title">Type Scale</span><span class="badge">5 styles</span></div>
      <div class="type-grid">
        <?php
        $typeScaleRows = [
            ['token'=>'typography.h1',     'size'=>$d['h1_size'],   'weight'=>$d['h1_weight'],   'family'=>$d['font_primary'],   'preview'=>'Hair Restoration'],
            ['token'=>'typography.logo',   'size'=>$d['logo_size'], 'weight'=>$d['logo_weight'], 'family'=>$d['font_primary'],   'preview'=>strtolower($d['brand_name']).' hair'],
            ['token'=>'typography.h4',     'size'=>$d['h4_size'],   'weight'=>$d['h4_weight'],   'family'=>$d['font_secondary'], 'preview'=>'Surgical &amp; non-surgical hair restoration.'],
            ['token'=>'typography.h5',     'size'=>$d['h5_size'],   'weight'=>$d['h5_weight'],   'family'=>$d['font_primary'],   'preview'=>'Submit photos · Free consult · Chat now'],
            ['token'=>'typography.button', 'size'=>$d['btn_size'],  'weight'=>$d['btn_weight'],  'family'=>$d['font_primary'],   'preview'=>htmlspecialchars($d['btn_label_lg'])],
        ];
        foreach ($typeScaleRows as $tr):
            $previewPx = min(intval($tr['size']), 38); ?>
        <div class="type-row">
          <span class="type-label"><?= $tr['token'] ?></span>
          <span class="type-preview" style="font-family:'<?= $tr['family'] ?>',sans-serif;font-weight:<?= $tr['weight'] ?>;font-size:<?= $previewPx ?>px;line-height:1.1;"><?= $tr['preview'] ?></span>
          <div class="type-specs">
            <span class="type-spec-item"><?= $tr['family'] ?> <?= weightLabel($tr['weight']) ?></span>
            <span class="type-spec-item"><?= $tr['size'] ?>px / 100%</span>
            <span class="type-spec-item">weight: <?= $tr['weight'] ?></span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 03 SPACING -->
  <section class="section" id="spacing">
    <div class="section-header">
      <span class="section-number">03</span>
      <h2 class="section-title">Spacing &amp; Sizing</h2>
    </div>
    <p class="section-desc">Semua nilai spacing dan sizing mengikuti token berikut.</p>
    <div class="card">
      <div class="card-header"><span class="card-title">Layout Tokens</span><span class="badge">8 tokens</span></div>
      <div class="spacing-list">
        <?php foreach ($spacingTokens as $st):
            $barW = min(intval($st['value']) * 0.08, 200); ?>
        <div class="spacing-row">
          <span class="spacing-token"><?= $st['token'] ?></span>
          <span class="spacing-desc"><?= $st['desc'] ?></span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:<?= $barW ?>px;"></div>
            <span class="spacing-value"><?= $st['value'] ?></span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 04 BORDER RADIUS -->
  <section class="section" id="radius">
    <div class="section-header">
      <span class="section-number">04</span>
      <h2 class="section-title">Border Radius</h2>
    </div>
    <div class="card">
      <div class="card-header"><span class="card-title">Radius Scale</span><span class="badge">4 tokens</span></div>
      <div style="padding:24px;display:flex;gap:24px;align-items:flex-end;flex-wrap:wrap;">
        <?php
        $radiiDisplay = [
            ['label'=>'radius.none',     'val'=>0,                          'token'=>'none'],
            ['label'=>'radius.button',   'val'=>$d['radius_button'],        'token'=>'button'],
            ['label'=>'radius.image-sm', 'val'=>$d['radius_image_sm'],      'token'=>'image-sm'],
            ['label'=>'radius.image-lg', 'val'=>$d['radius_image_lg'],      'token'=>'image-lg'],
        ];
        foreach ($radiiDisplay as $rd): ?>
        <div style="text-align:center;">
          <div style="width:60px;height:60px;background:<?= $d['color_primer'] ?>;border-radius:<?= $rd['val'] ?>px;margin:0 auto 8px;"></div>
          <div style="font-family:'DM Mono',monospace;font-size:11px;color:<?= $d['color_primer'] ?>;"><?= $rd['label'] ?></div>
          <div style="font-size:11px;color:#666;"><?= $rd['val'] ?>px</div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 05 BUTTONS -->
  <section class="section" id="buttons">
    <div class="section-header">
      <span class="section-number">05</span>
      <h2 class="section-title">Buttons</h2>
      <span class="pill pill-stable">Stable</span>
    </div>
    <div class="card">
      <div class="card-header"><span class="card-title">Live Preview</span><span class="badge">3 variants</span></div>
      <div class="component-preview">
        <button style="background:<?= $d['color_primer'] ?>;color:<?= $d['color_light'] ?>;padding:<?= $d['btn_padding_v'] ?>px <?= $d['btn_padding_h'] ?>px;border-radius:<?= $d['radius_button'] ?>px;border:none;font-family:'<?= $d['font_primary'] ?>',sans-serif;font-size:<?= min(intval($d['btn_size']), 20) ?>px;font-weight:<?= $d['btn_weight'] ?>;cursor:default;text-transform:capitalize;">
          <?= htmlspecialchars($d['btn_label_lg']) ?>
        </button>
        <button style="background:<?= $d['color_primer'] ?>;color:<?= $d['color_light'] ?>;padding:<?= intval($d['btn_padding_v'])*0.7 ?>px <?= intval($d['btn_padding_h'])*0.75 ?>px;border-radius:<?= $d['radius_button'] ?>px;border:none;font-family:'<?= $d['font_primary'] ?>',sans-serif;font-size:14px;font-weight:<?= $d['btn_weight'] ?>;cursor:default;text-transform:capitalize;">
          <?= htmlspecialchars($d['btn_label_md']) ?>
        </button>
        <button style="background:<?= $d['color_primer'] ?>;color:<?= $d['color_light'] ?>;padding:8px 14px;border-radius:<?= $d['radius_button'] ?>px;border:none;font-family:'<?= $d['font_primary'] ?>',sans-serif;font-size:12px;font-weight:<?= $d['btn_weight'] ?>;cursor:default;text-transform:capitalize;">
          <?= htmlspecialchars($d['btn_label_sm']) ?>
        </button>
      </div>
      <div class="code-block"><span class="cc">/* btn-primer — Large */</span>
<span class="ck">&lt;button</span> className=<span class="cs">"bg-[<?= $d['color_primer'] ?>] text-white px-[<?= $d['btn_padding_h'] ?>px] py-[<?= $d['btn_padding_v'] ?>px] rounded-[<?= $d['radius_button'] ?>px]
         font-['<?= $d['font_primary'] ?>'] text-[<?= $d['btn_size'] ?>px] capitalize"</span><span class="ck">&gt;</span>
  <?= htmlspecialchars($d['btn_label_lg']) ?>
<span class="ck">&lt;/button&gt;</span></div>
    </div>
  </section>

  <!-- 06 NAVBAR -->
  <section class="section" id="navbar">
    <div class="section-header">
      <span class="section-number">06</span>
      <h2 class="section-title">Navbar</h2>
      <span class="pill pill-stable">Stable</span>
    </div>
    <div class="card">
      <div class="card-header"><span class="card-title">Live Preview</span></div>
      <div style="padding:16px;background:#f5f5f5;">
        <div style="background:<?= $d['color_primer'] ?>;padding:12px 24px;border-radius:8px;display:flex;align-items:center;justify-content:space-between;">
          <span style="font-family:'<?= $d['font_primary'] ?>',sans-serif;font-weight:700;font-size:<?= $d['logo_size'] ?>px;color:<?= $d['color_background'] ?>;">
            <?= htmlspecialchars($d['navbar_logo']) ?>
          </span>
          <div style="display:flex;gap:<?= $d['nav_item_gap'] ?>px;font-family:'<?= $d['font_primary'] ?>',sans-serif;font-size:<?= $d['h5_size'] ?>px;color:<?= $d['color_background'] ?>;opacity:.9;">
            <?php foreach ($navLinks as $link): ?>
            <span><?= htmlspecialchars($link) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 07 ICONS -->
  <section class="section" id="icons">
    <div class="section-header">
      <span class="section-number">07</span>
      <h2 class="section-title">Icons</h2>
      <span class="pill pill-beta">In Progress</span>
    </div>
    <div class="card">
      <div class="card-header"><span class="card-title">Icon Inventory</span><span class="badge"><?= count($icons) ?> items</span></div>
      <div style="overflow-x:auto;">
        <table class="usage-table">
          <thead><tr><th>Token Name</th><th>Context</th><th>Size</th><th>Format</th><th>Status</th></tr></thead>
          <tbody>
            <?php foreach ($icons as $icon): ?>
            <tr>
              <td class="mono"><?= htmlspecialchars($icon['token']) ?></td>
              <td><?= htmlspecialchars($icon['ctx']) ?></td>
              <td><?= htmlspecialchars($icon['sz']) ?>px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- 08 DO & DON'T -->
  <section class="section" id="dodont">
    <div class="section-header">
      <span class="section-number">08</span>
      <h2 class="section-title">Do &amp; Don't</h2>
    </div>
    <div class="do-dont-grid">
      <div class="do-card">
        <div class="tag">✓ Do</div>
        <div class="preview">
          <button style="background:<?= $d['color_primer'] ?>;color:<?= $d['color_light'] ?>;padding:10px 20px;border-radius:<?= $d['radius_button'] ?>px;border:none;font-family:'<?= $d['font_primary'] ?>',sans-serif;font-size:14px;text-transform:capitalize;">
            <?= htmlspecialchars($d['btn_label_md']) ?>
          </button>
        </div>
        <div class="note"><?= $d['do_dont_1_do'] ?></div>
      </div>
      <div class="dont-card">
        <div class="tag">✕ Don't</div>
        <div class="preview">
          <button style="background:#2563eb;color:white;padding:10px 20px;border-radius:4px;border:none;font-size:14px;">
            <?= htmlspecialchars($d['btn_label_md']) ?>
          </button>
        </div>
        <div class="note"><?= $d['do_dont_1_dont'] ?></div>
      </div>
    </div>
  </section>

  <!-- 09 TOKEN USAGE -->
  <section class="section" id="usage">
    <div class="section-header">
      <span class="section-number">09</span>
      <h2 class="section-title">Token Usage Map</h2>
    </div>
    <div class="card">
      <div style="overflow-x:auto;">
        <table class="usage-table">
          <thead><tr><th>Token</th><th>Value</th><th>Digunakan di</th><th>Tailwind class</th></tr></thead>
          <tbody>
            <tr><td class="mono">color.background</td><td><?= $d['color_background'] ?></td><td>Page bg, hero section</td><td class="mono">bg-[<?= $d['color_background'] ?>]</td></tr>
            <tr><td class="mono">color.primer</td><td><?= $d['color_primer'] ?></td><td>Navbar bg, all buttons, accents</td><td class="mono">bg-[<?= $d['color_primer'] ?>]</td></tr>
            <tr><td class="mono">color.dark</td><td><?= $d['color_dark'] ?></td><td>All headings, body text</td><td class="mono">text-[<?= $d['color_dark'] ?>]</td></tr>
            <tr><td class="mono">color.light</td><td><?= $d['color_light'] ?></td><td>Button text, card backgrounds</td><td class="mono">text-white</td></tr>
            <tr><td class="mono">typography.h1</td><td><?= $d['font_primary'] ?> <?= $d['h1_weight'] ?> <?= $d['h1_size'] ?>px</td><td>Hero headline, section titles</td><td class="mono">font-['<?= $d['font_primary'] ?>'] text-[<?= $d['h1_size'] ?>px]</td></tr>
            <tr><td class="mono">typography.h4</td><td><?= $d['font_secondary'] ?> <?= $d['h4_weight'] ?> <?= $d['h4_size'] ?>px</td><td>Hero subheading, card descriptions</td><td class="mono">font-['<?= $d['font_secondary'] ?>'] text-[<?= $d['h4_size'] ?>px]</td></tr>
            <tr><td class="mono">typography.h5</td><td><?= $d['font_primary'] ?> <?= $d['h5_weight'] ?> <?= $d['h5_size'] ?>px</td><td>Nav links, list items</td><td class="mono">font-['<?= $d['font_primary'] ?>'] text-[<?= $d['h5_size'] ?>px]</td></tr>
            <tr><td class="mono">borderRadius.button</td><td><?= $d['radius_button'] ?>px</td><td>All btn-primer variants</td><td class="mono">rounded-[<?= $d['radius_button'] ?>px]</td></tr>
            <tr><td class="mono">borderRadius.image-sm</td><td><?= $d['radius_image_sm'] ?>px</td><td>Hero grid images, result cards</td><td class="mono">rounded-[<?= $d['radius_image_sm'] ?>px]</td></tr>
            <tr><td class="mono">spacing.content-width</td><td><?= $d['content_width'] ?>px</td><td>Inner wrapper semua section</td><td class="mono">w-[<?= $d['content_width'] ?>px]</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- 10 CHANGELOG -->
  <section class="section" id="changelog">
    <div class="section-header">
      <span class="section-number">10</span>
      <h2 class="section-title">Changelog</h2>
    </div>
    <div class="card">
      <div class="changelog-list">
        <?php foreach ($changelogRows as $row):
            $parts = array_map('trim', explode('|', $row));
            if (count($parts) >= 3): ?>
        <div class="changelog-entry">
          <span class="cl-version"><?= htmlspecialchars($parts[0]) ?></span>
          <span class="cl-date"><?= htmlspecialchars($parts[1]) ?></span>
          <span class="cl-desc"><?= htmlspecialchars($parts[2]) ?></span>
        </div>
        <?php endif; endforeach; ?>
      </div>
    </div>
    <?php if ($d['contribution_note']): ?>
    <div style="margin-top:24px;padding:24px;background:rgba(139,55,52,.08);border:1px solid rgba(139,55,52,.2);border-radius:12px;">
      <div style="font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:<?= $d['color_primer'] ?>;margin-bottom:8px;">Contribution Guidelines</div>
      <p style="font-size:13px;color:#aaa;line-height:1.7;"><?= htmlspecialchars($d['contribution_note']) ?></p>
    </div>
    <?php endif; ?>
  </section>

</main>
</div>

<!-- Edit button -->
<a href="index.php" class="edit-btn">✦ Edit Design System</a>

<script>
const sections = document.querySelectorAll('.section,.doc-hero');
const links    = document.querySelectorAll('.sidebar-link');
const sectionIds = ['overview','colors','typography','spacing','radius','buttons','navbar','icons','dodont','usage','changelog'];
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      const idx = sectionIds.indexOf(e.target.id);
      if (idx !== -1) { links.forEach(l=>l.classList.remove('active')); links[idx]?.classList.add('active'); }
    }
  });
}, { threshold: 0.25 });
sections.forEach(s => observer.observe(s));
</script>
</body>
</html>
<?php
$html = ob_get_clean();
file_put_contents('preview.php', $html);

// Redirect back to editor with success flag
header('Location: index.php?saved=1');
exit;
