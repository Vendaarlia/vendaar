<?php
// Load saved data if exists
$dataFile = '/util/admin/data/design-system.json';
$data = [];
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true) ?? [];
}

// Defaults
$d = array_merge([
    'brand_name'        => 'MAXIM',
    'ds_version'        => 'v1.0.0',
    'figma_file'        => 'MAXIM-WEBSITE',
    'framework'         => 'React + Tailwind',

    // Colors
    'color_background'  => '#FDF5EB',
    'color_primer'      => '#8B3734',
    'color_dark'        => '#000000',
    'color_light'       => '#FFFFFF',
    'color_bg_desc'     => 'Latar belakang utama halaman — krem hangat',
    'color_primer_desc' => 'Warna brand utama — navbar, tombol, aksen',
    'color_dark_desc'   => 'Teks utama — judul dan body text',
    'color_light_desc'  => 'Putih — background kartu, teks di atas primer',

    // Typography
    'font_primary'      => 'Roboto',
    'font_secondary'    => 'Inter',
    'h1_size'           => '75',
    'h1_weight'         => '600',
    'h4_size'           => '24',
    'h4_weight'         => '400',
    'h5_size'           => '20',
    'h5_weight'         => '400',
    'logo_size'         => '32',
    'logo_weight'       => '700',
    'btn_size'          => '24',
    'btn_weight'        => '400',

    // Spacing
    'page_width'        => '1280',
    'content_width'     => '1160',
    'page_padding_h'    => '60',
    'section_gap'       => '80',
    'card_gap'          => '11',
    'btn_padding_h'     => '32',
    'btn_padding_v'     => '17',
    'nav_item_gap'      => '40',

    // Border Radius
    'radius_button'     => '15',
    'radius_image_sm'   => '27',
    'radius_image_lg'   => '36',

    // Components
    'navbar_logo'       => 'maxim hair',
    'navbar_links'      => "submit photos\nfree consult\nchat now\nwhatsApp",
    'btn_label_lg'      => 'More Before & After',
    'btn_label_md'      => 'Free Consult',
    'btn_label_sm'      => 'Get Directions',

    // Do & Don't
    'do_dont_1_do'      => 'Gunakan btn-primer dengan warna #8B3734, border-radius 15px, font Roboto capitalize.',
    'do_dont_1_dont'    => 'Jangan buat tombol dengan warna atau radius berbeda dari design token yang sudah ditetapkan.',

    // Changelog
    'changelog'         => "v1.0.0 | Mar 2026 | Initial release. Color tokens, typography scale, spacing system, border radius, semua komponen utama.\nv0.9.0 | Feb 2026 | Design audit dari Figma file MAXIM-WEBSITE.",

    'contribution_note' => 'Setiap perubahan pada design system harus melalui review dari minimal 1 designer dan 1 developer. Update token di Tokens Studio terlebih dahulu, kemudian update file ini, lalu bump versi menggunakan semantic versioning (MAJOR.MINOR.PATCH).',

], $data);

$saved = isset($_GET['saved']) ? $_GET['saved'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Design System CMS — MAXIM</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    /* ── Palette dari user ── */
    --bg:        #191d1f;
    --surface:   #1f2428;
    --surface2:  #252a2e;
    --border:    #2c3135;
    --border2:   #d1d5db;
    --text:      #ffffff;
    --muted:     #9ca3af;
    --accent:    #9239df;
    --accent-hv: #7b2cbe;
    --accent-lg: rgba(146,57,223,0.15);
    --accent-bd: rgba(146,57,223,0.35);
    --cream:     #ffffff;
    --green:     #22c55e;
    --green-bg:  rgba(34,197,94,0.08);
    --amber:     #facc15;

    --font-display: 'Inter', sans-serif;
    --font-body:    'Inter', sans-serif;
    --font-mono:    'DM Mono', monospace;

    --sidebar-w: 220px;
    --header-h:  56px;
}

html { scroll-behavior: smooth; }
body {
    font-family: var(--font-body);
    background: var(--bg);
    color: var(--text);
    font-size: 14px;
    min-height: 100vh;
    overflow-x: hidden;
}

/* ─── TOAST ─── */
.toast {
    position: fixed;
    top: 20px; right: 20px;
    background: var(--green-bg);
    border: 1px solid rgba(34,197,94,0.3);
    color: var(--green);
    padding: 12px 20px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 500;
    z-index: 9999;
    display: flex; align-items: center; gap: 10px;
    transform: translateY(-80px);
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    pointer-events: none;
}
.toast.show { transform: translateY(0); opacity: 1; }
.toast-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--green); flex-shrink: 0; }

/* ─── HEADER ─── */
.header {
    position: fixed; top: 0; left: 0; right: 0;
    height: var(--header-h);
    background: rgba(25,29,31,0.92);
    backdrop-filter: blur(16px);
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 28px;
    z-index: 100;
}

.header-left { display: flex; align-items: center; gap: 16px; }

.header-logo {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 15px;
    color: var(--cream);
    letter-spacing: 2px;
    text-transform: uppercase;
}

.header-divider { width: 1px; height: 20px; background: var(--border2); }

.header-label {
    font-size: 11px;
    color: var(--muted);
    font-family: var(--font-mono);
    letter-spacing: 1px;
}

.header-right { display: flex; align-items: center; gap: 10px; }

.btn-preview {
    display: flex; align-items: center; gap: 8px;
    padding: 8px 16px;
    border-radius: 8px;
    border: 1px solid var(--border2);
    background: var(--surface2);
    color: var(--text);
    font-family: var(--font-body);
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-preview:hover { border-color: var(--accent); color: var(--cream); }

.btn-save {
    display: flex; align-items: center; gap: 8px;
    padding: 8px 20px;
    border-radius: 8px;
    border: none;
    background: var(--accent);
    color: #fff;
    font-family: var(--font-body);
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    letter-spacing: 0.3px;
}
.btn-save:hover { background: var(--accent-hv); transform: translateY(-1px); box-shadow: 0 4px 16px rgba(146,57,223,0.4); }
.btn-save:active { transform: translateY(0); box-shadow: none; }

/* ─── LAYOUT ─── */
.layout {
    display: flex;
    padding-top: var(--header-h);
    min-height: 100vh;
}

/* ─── SIDEBAR ─── */
.sidebar {
    width: var(--sidebar-w);
    min-width: var(--sidebar-w);
    background: var(--surface);
    border-right: 1px solid var(--border);
    position: fixed;
    top: var(--header-h);
    left: 0;
    bottom: 0;
    overflow-y: auto;
    padding: 20px 0 40px;
}

.nav-section-label {
    padding: 16px 20px 6px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--muted);
    font-family: var(--font-mono);
}

.nav-link {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 20px;
    font-size: 12px;
    font-weight: 500;
    color: #666;
    text-decoration: none;
    border-left: 2px solid transparent;
    transition: all 0.15s;
    cursor: pointer;
}
.nav-link:hover, .nav-link.active {
    color: var(--cream);
    border-left-color: var(--accent);
    background: rgba(146,57,223,0.08);
}
.nav-link .icon { font-size: 14px; min-width: 18px; }

/* ─── MAIN ─── */
.main {
    margin-left: var(--sidebar-w);
    flex: 1;
    padding: 36px 40px 80px;
    max-width: 900px;
}

/* ─── FORM SECTION ─── */
.form-section {
    margin-bottom: 48px;
    scroll-margin-top: 80px;
}

.section-head {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 24px;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--border);
}

.section-num {
    font-family: var(--font-mono);
    font-size: 10px;
    color: var(--accent);
    background: var(--accent-lg);
    border: 1px solid var(--accent-bd);
    padding: 3px 9px;
    border-radius: 5px;
}

.section-title {
    font-family: var(--font-display);
    font-size: 16px;
    font-weight: 700;
    color: var(--cream);
}

.section-desc {
    font-size: 12px;
    color: var(--muted);
    margin-bottom: 20px;
    line-height: 1.7;
}

/* ─── CARD ─── */
.card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 16px;
}

.card-head {
    padding: 12px 18px;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; justify-content: space-between;
    background: rgba(255,255,255,0.02);
}

.card-label {
    font-size: 10px; font-weight: 700;
    letter-spacing: 1.5px; text-transform: uppercase;
    color: var(--muted);
    font-family: var(--font-mono);
}

.card-body { padding: 18px; }

/* ─── FORM ELEMENTS ─── */
.field { margin-bottom: 16px; }
.field:last-child { margin-bottom: 0; }

.field-label {
    display: block;
    font-size: 11px; font-weight: 600;
    color: #888;
    margin-bottom: 6px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    font-family: var(--font-mono);
}

.field-label span {
    color: var(--accent);
    margin-left: 4px;
}

.field-hint {
    font-size: 11px;
    color: var(--muted);
    margin-top: 5px;
    line-height: 1.5;
}

input[type="text"],
input[type="color"],
select,
textarea {
    width: 100%;
    background: var(--surface2);
    border: 1px solid var(--border2);
    border-radius: 8px;
    color: var(--text);
    font-family: var(--font-mono);
    font-size: 12px;
    padding: 10px 14px;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    appearance: none;
}

input[type="text"]:focus,
select:focus,
textarea:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(146,57,223,0.15);
}

textarea {
    resize: vertical;
    min-height: 80px;
    line-height: 1.6;
}

/* Color input special */
.color-field {
    display: flex; align-items: center; gap: 10px;
}

.color-field input[type="color"] {
    width: 42px; height: 42px;
    padding: 3px;
    border-radius: 8px;
    cursor: pointer;
    flex-shrink: 0;
}

.color-field input[type="text"] {
    font-family: var(--font-mono);
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* ─── GRID HELPERS ─── */
.grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }
.grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }

/* ─── COLOR PREVIEW ROW ─── */
.color-preview-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    padding: 18px;
}

.color-chip {
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid var(--border);
}

.chip-swatch { height: 52px; transition: all 0.3s; }
.chip-info { padding: 8px 10px; background: rgba(0,0,0,0.3); }
.chip-token { font-family: var(--font-mono); font-size: 9px; color: var(--accent); }
.chip-hex { font-family: var(--font-mono); font-size: 12px; color: var(--cream); font-weight: 500; }

/* ─── BADGE ─── */
.badge {
    font-family: var(--font-mono);
    font-size: 10px;
    padding: 3px 9px;
    border-radius: 100px;
    background: rgba(255,255,255,0.05);
    color: var(--muted);
    border: 1px solid var(--border);
}

/* ─── SPACING VISUAL ─── */
.spacing-preview {
    display: flex; align-items: center; gap: 12px;
    margin-top: 8px;
    padding: 10px 14px;
    background: rgba(146,57,223,0.05);
    border-radius: 6px;
    border: 1px dashed var(--accent-bd);
}

.spacing-bar-preview {
    height: 6px;
    background: linear-gradient(90deg, var(--accent), rgba(146,57,223,0.3));
    border-radius: 3px;
    transition: width 0.4s ease;
    min-width: 4px;
    max-width: 200px;
}

.spacing-label {
    font-family: var(--font-mono);
    font-size: 11px;
    color: var(--accent);
    white-space: nowrap;
}

/* ─── COMPONENT LIVE PREVIEW ─── */
.live-preview-box {
    background: var(--cream);
    border-radius: 10px;
    padding: 24px;
    margin-top: 12px;
    display: flex; align-items: center; justify-content: center; gap: 16px;
    flex-wrap: wrap;
    min-height: 80px;
}

.preview-label {
    font-size: 10px; font-weight: 700;
    letter-spacing: 1.5px; text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 8px;
    font-family: var(--font-mono);
}

/* ─── DIVIDER ─── */
.divider { border: none; border-top: 1px solid var(--border); margin: 8px 0 20px; }

/* ─── RANGE INPUT ─── */
input[type="range"] {
    width: 100%;
    height: 4px;
    background: var(--border);
    border-radius: 2px;
    outline: none;
    padding: 0;
    cursor: pointer;
    border: none;
}
input[type="range"]::-webkit-slider-thumb {
    appearance: none;
    width: 16px; height: 16px;
    border-radius: 50%;
    background: var(--accent);
    cursor: pointer;
    margin-top: 0;
}

.range-row { display: flex; align-items: center; gap: 14px; }
.range-val {
    font-family: var(--font-mono);
    font-size: 13px;
    color: var(--cream);
    min-width: 48px;
    text-align: right;
}

/* ─── SCROLLBAR ─── */
::-webkit-scrollbar { width: 5px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: #2c3135; border-radius: 3px; }

/* ─── CHANGELOG ROWS ─── */
.changelog-hint {
    font-size: 11px; color: var(--muted);
    margin-top: 8px; line-height: 1.6;
}

/* ─── RADIUS VISUAL ─── */
.radius-preview-row {
    display: flex; gap: 20px; align-items: flex-end;
    padding: 16px 18px;
    flex-wrap: wrap;
}

.radius-box-wrap { text-align: center; }
.radius-box {
    width: 48px; height: 48px;
    background: var(--accent);
    margin: 0 auto 6px;
    transition: border-radius 0.3s;
}
.radius-box-label {
    font-family: var(--font-mono);
    font-size: 9px; color: var(--muted);
}

/* ─── ICONS TABLE ─── */
.icons-table { width: 100%; border-collapse: collapse; }
.icons-table th {
    text-align: left; padding: 10px 14px;
    font-size: 9px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;
    color: var(--muted); border-bottom: 1px solid var(--border);
    background: rgba(255,255,255,0.02);
    font-family: var(--font-mono);
}
.icons-table td {
    padding: 10px 14px; font-size: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.04);
    vertical-align: middle;
}
.icons-table tr:last-child td { border-bottom: none; }
.icons-table input[type="text"] { padding: 6px 10px; }

/* ─── STATUS BADGE ─── */
.pill {
    display: inline-flex; align-items: center; gap: 4px;
    padding: 2px 8px; border-radius: 100px;
    font-size: 9px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;
    font-family: var(--font-mono);
}
.pill-stable { background: rgba(34,197,94,0.1); color: #4ade80; border: 1px solid rgba(34,197,94,0.2); }
.pill-beta   { background: rgba(251,191,36,0.1); color: #fbbf24; border: 1px solid rgba(251,191,36,0.2); }
.pill-wip    { background: rgba(239,68,68,0.1); color: #f87171; border: 1px solid rgba(239,68,68,0.2); }

/* ─── SECTION INTRO ─── */
.intro-card {
    background: linear-gradient(135deg, rgba(146,57,223,0.1) 0%, rgba(25,29,31,0) 60%);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 28px 32px;
    margin-bottom: 40px;
    position: relative; overflow: hidden;
}
.intro-card::before {
    content: '';
    position: absolute; top: -60px; right: -60px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(146,57,223,0.12) 0%, transparent 70%);
    pointer-events: none;
}
.intro-eyebrow {
    font-family: var(--font-mono);
    font-size: 10px; letter-spacing: 3px; text-transform: uppercase;
    color: var(--accent); margin-bottom: 8px;
}
.intro-title {
    font-family: var(--font-display);
    font-size: 26px; font-weight: 800;
    color: var(--cream); line-height: 1.1; margin-bottom: 8px;
}
.intro-desc { font-size: 13px; color: var(--muted); line-height: 1.7; max-width: 480px; }

</style>
</head>
<body>

<!-- TOAST -->
<div class="toast" id="toast">
    <div class="toast-dot"></div>
    <span>Design system berhasil disimpan!</span>
</div>

<!-- HEADER -->
<header class="header">
    <div class="header-left">
        <span class="header-logo">DS·CMS</span>
        <div class="header-divider"></div>
        <span class="header-label">Design System Editor</span>
    </div>
    <div class="header-right">
        <a href="preview.php" target="_blank" class="btn-preview">
            <span>↗</span> Preview
        </a>
        <button class="btn-save" onclick="submitForm()">
            <span>✦</span> Save & Generate
        </button>
    </div>
</header>

<div class="layout">

    <!-- SIDEBAR -->
    <nav class="sidebar">
        <span class="nav-section-label">Foundation</span>
        <a class="nav-link active" onclick="scrollTo('meta')">
            <span class="icon">◈</span> Overview
        </a>
        <a class="nav-link" onclick="scrollTo('colors')">
            <span class="icon">◉</span> Colors
        </a>
        <a class="nav-link" onclick="scrollTo('typography')">
            <span class="icon">T</span> Typography
        </a>
        <a class="nav-link" onclick="scrollTo('spacing')">
            <span class="icon">⊞</span> Spacing
        </a>
        <a class="nav-link" onclick="scrollTo('radius')">
            <span class="icon">◻</span> Border Radius
        </a>

        <span class="nav-section-label">Components</span>
        <a class="nav-link" onclick="scrollTo('buttons')">
            <span class="icon">▣</span> Buttons
        </a>
        <a class="nav-link" onclick="scrollTo('navbar')">
            <span class="icon">≡</span> Navbar
        </a>
        <a class="nav-link" onclick="scrollTo('icons')">
            <span class="icon">✦</span> Icons
        </a>

        <span class="nav-section-label">Content</span>
        <a class="nav-link" onclick="scrollTo('changelog')">
            <span class="icon">◷</span> Changelog
        </a>
    </nav>

    <!-- MAIN FORM -->
    <main class="main">
        <form id="cms-form" action="/util/admin/save.php" method="POST">

            <!-- INTRO -->
            <div class="intro-card">
                <div class="intro-eyebrow">Design System CMS</div>
                <div class="intro-title">Edit &amp; Generate<br>Design Docs</div>
                <div class="intro-desc">Ubah token, komponen, dan konten di sini. Klik <strong style="color:var(--cream)">Save &amp; Generate</strong> untuk memperbarui halaman dokumentasi secara otomatis.</div>
            </div>

            <!-- ═══════════════════════════
                 01 · META / OVERVIEW
            ═══════════════════════════ -->
            <div class="form-section" id="meta">
                <div class="section-head">
                    <span class="section-num">01</span>
                    <span class="section-title">Overview &amp; Meta</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Project Info</span>
                    </div>
                    <div class="card-body">
                        <div class="grid-2">
                            <div class="field">
                                <label class="field-label">Brand Name <span>*</span></label>
                                <input type="text" name="brand_name" value="<?= htmlspecialchars($d['brand_name']) ?>"/>
                            </div>
                            <div class="field">
                                <label class="field-label">Version <span>*</span></label>
                                <input type="text" name="ds_version" value="<?= htmlspecialchars($d['ds_version']) ?>"/>
                            </div>
                            <div class="field">
                                <label class="field-label">Figma File</label>
                                <input type="text" name="figma_file" value="<?= htmlspecialchars($d['figma_file']) ?>"/>
                            </div>
                            <div class="field">
                                <label class="field-label">Framework</label>
                                <input type="text" name="framework" value="<?= htmlspecialchars($d['framework']) ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ═══════════════════════════
                 02 · COLORS
            ═══════════════════════════ -->
            <div class="form-section" id="colors">
                <div class="section-head">
                    <span class="section-num">02</span>
                    <span class="section-title">Color Tokens</span>
                </div>

                <!-- Live Color Preview -->
                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Live Preview</span>
                        <span class="badge">4 tokens</span>
                    </div>
                    <div class="color-preview-row" id="colorPreviewRow">
                        <div class="color-chip">
                            <div class="chip-swatch" id="swatch-bg" style="background:<?= $d['color_background'] ?>;"></div>
                            <div class="chip-info">
                                <div class="chip-token">color.background</div>
                                <div class="chip-hex" id="hex-bg"><?= $d['color_background'] ?></div>
                            </div>
                        </div>
                        <div class="color-chip">
                            <div class="chip-swatch" id="swatch-primer" style="background:<?= $d['color_primer'] ?>;"></div>
                            <div class="chip-info">
                                <div class="chip-token">color.primer</div>
                                <div class="chip-hex" id="hex-primer"><?= $d['color_primer'] ?></div>
                            </div>
                        </div>
                        <div class="color-chip">
                            <div class="chip-swatch" id="swatch-dark" style="background:<?= $d['color_dark'] ?>;"></div>
                            <div class="chip-info">
                                <div class="chip-token">color.dark</div>
                                <div class="chip-hex" id="hex-dark"><?= $d['color_dark'] ?></div>
                            </div>
                        </div>
                        <div class="color-chip">
                            <div class="chip-swatch" id="swatch-light" style="background:<?= $d['color_light'] ?>; border: 1px solid #333;"></div>
                            <div class="chip-info">
                                <div class="chip-token">color.light</div>
                                <div class="chip-hex" id="hex-light"><?= $d['color_light'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Color Inputs -->
                <?php
                $colorFields = [
                    ['token' => 'color.background', 'name' => 'color_background', 'desc' => 'color_bg_desc',     'label' => 'Background'],
                    ['token' => 'color.primer',      'name' => 'color_primer',     'desc' => 'color_primer_desc', 'label' => 'Primer (Brand)'],
                    ['token' => 'color.dark',        'name' => 'color_dark',       'desc' => 'color_dark_desc',   'label' => 'Dark'],
                    ['token' => 'color.light',       'name' => 'color_light',      'desc' => 'color_light_desc',  'label' => 'Light'],
                ];
                $swatchIds = ['color_background'=>'bg', 'color_primer'=>'primer', 'color_dark'=>'dark', 'color_light'=>'light'];
                foreach ($colorFields as $cf): ?>
                <div class="card" style="margin-bottom:10px;">
                    <span class="card-head">
                        <span class="card-label"><?= $cf['label'] ?></span>
                        <span class="badge" style="font-size:9px;color:var(--accent);"><?= $cf['token'] ?></span>
                    </span>
                    <div class="card-body">
                        <div class="grid-2">
                            <div class="field">
                                <label class="field-label">Hex Value</label>
                                <div class="color-field">
                                    <input type="color"
                                           value="<?= $d[$cf['name']] ?>"
                                           oninput="syncColor('<?= $cf['name'] ?>', '<?= $swatchIds[$cf['name']] ?>', this.value)"/>
                                    <input type="text"
                                           name="<?= $cf['name'] ?>"
                                           id="txt_<?= $cf['name'] ?>"
                                           value="<?= htmlspecialchars($d[$cf['name']]) ?>"
                                           oninput="syncColorFromText('<?= $cf['name'] ?>', '<?= $swatchIds[$cf['name']] ?>', this)"
                                           placeholder="#000000"/>
                                </div>
                            </div>
                            <div class="field">
                                <label class="field-label">Description</label>
                                <input type="text" name="<?= $cf['desc'] ?>" value="<?= htmlspecialchars($d[$cf['desc']]) ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- ═══════════════════════════
                 03 · TYPOGRAPHY
            ═══════════════════════════ -->
            <div class="form-section" id="typography">
                <div class="section-head">
                    <span class="section-num">03</span>
                    <span class="section-title">Typography</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Font Families</span>
                    </div>
                    <div class="card-body">
                        <div class="grid-2">
                            <div class="field">
                                <label class="field-label">Primary Font <span>*</span></label>
                                <input type="text" name="font_primary" value="<?= htmlspecialchars($d['font_primary']) ?>" placeholder="Roboto"/>
                                <div class="field-hint">Digunakan untuk H1, logo, navbar, tombol</div>
                            </div>
                            <div class="field">
                                <label class="field-label">Secondary Font</label>
                                <input type="text" name="font_secondary" value="<?= htmlspecialchars($d['font_secondary']) ?>" placeholder="Inter"/>
                                <div class="field-hint">Digunakan untuk H4, deskripsi panjang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $typeStyles = [
                    ['label' => 'H1 — Hero Headline', 'token' => 'typography.h1', 'sz' => 'h1_size', 'wt' => 'h1_weight'],
                    ['label' => 'H4 — Subheading',    'token' => 'typography.h4', 'sz' => 'h4_size', 'wt' => 'h4_weight'],
                    ['label' => 'H5 — Nav / Label',   'token' => 'typography.h5', 'sz' => 'h5_size', 'wt' => 'h5_weight'],
                    ['label' => 'Logo',                'token' => 'typography.logo','sz' => 'logo_size','wt' => 'logo_weight'],
                    ['label' => 'Button Text',         'token' => 'typography.button','sz' => 'btn_size','wt' => 'btn_weight'],
                ];
                foreach ($typeStyles as $ts): ?>
                <div class="card" style="margin-bottom:10px;">
                    <div class="card-head">
                        <span class="card-label"><?= $ts['label'] ?></span>
                        <span class="badge" style="font-size:9px;color:var(--accent);"><?= $ts['token'] ?></span>
                    </div>
                    <div class="card-body">
                        <div class="grid-2">
                            <div class="field">
                                <label class="field-label">Font Size (px)</label>
                                <div class="range-row">
                                    <input type="range" min="10" max="120"
                                           value="<?= intval($d[$ts['sz']]) ?>"
                                           oninput="updateRange(this, '<?= $ts['sz'] ?>')"
                                           style="flex:1;"/>
                                    <span class="range-val" id="rv_<?= $ts['sz'] ?>"><?= $d[$ts['sz'] ] ?>px</span>
                                </div>
                                <input type="hidden" name="<?= $ts['sz'] ?>" id="<?= $ts['sz'] ?>" value="<?= htmlspecialchars($d[$ts['sz']]) ?>"/>
                            </div>
                            <div class="field">
                                <label class="field-label">Font Weight</label>
                                <select name="<?= $ts['wt'] ?>">
                                    <?php foreach ([300=>'Light',400=>'Regular',500=>'Medium',600=>'SemiBold',700=>'Bold',800=>'ExtraBold'] as $val=>$lbl): ?>
                                    <option value="<?= $val ?>" <?= $d[$ts['wt']] == $val ? 'selected':'' ?>><?= $lbl ?> (<?= $val ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- ═══════════════════════════
                 04 · SPACING
            ═══════════════════════════ -->
            <div class="form-section" id="spacing">
                <div class="section-head">
                    <span class="section-num">04</span>
                    <span class="section-title">Spacing &amp; Sizing</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Layout Tokens</span>
                        <span class="badge">8 tokens</span>
                    </div>
                    <div class="card-body">
                        <?php
                        $spacingFields = [
                            ['name'=>'page_width',     'label'=>'Page Width',              'token'=>'spacing.page-width',     'max'=>2560, 'unit'=>'px'],
                            ['name'=>'content_width',  'label'=>'Content Width',            'token'=>'spacing.content-width',  'max'=>2000, 'unit'=>'px'],
                            ['name'=>'page_padding_h', 'label'=>'Page Horizontal Padding',  'token'=>'spacing.page-padding-h', 'max'=>200,  'unit'=>'px'],
                            ['name'=>'section_gap',    'label'=>'Section Vertical Gap',     'token'=>'spacing.section-gap',    'max'=>200,  'unit'=>'px'],
                            ['name'=>'card_gap',       'label'=>'Card Gap',                 'token'=>'spacing.card-gap',       'max'=>60,   'unit'=>'px'],
                            ['name'=>'btn_padding_h',  'label'=>'Button Padding Horizontal','token'=>'spacing.btn-padding-h',  'max'=>100,  'unit'=>'px'],
                            ['name'=>'btn_padding_v',  'label'=>'Button Padding Vertical',  'token'=>'spacing.btn-padding-v',  'max'=>60,   'unit'=>'px'],
                            ['name'=>'nav_item_gap',   'label'=>'Nav Item Gap',             'token'=>'spacing.nav-item-gap',   'max'=>120,  'unit'=>'px'],
                        ];
                        foreach ($spacingFields as $sf): ?>
                        <div class="field">
                            <label class="field-label">
                                <?= $sf['label'] ?>
                                <span style="color:var(--muted);font-weight:400;">&nbsp;·&nbsp;<?= $sf['token'] ?></span>
                            </label>
                            <div class="range-row">
                                <input type="range" min="0" max="<?= $sf['max'] ?>"
                                       value="<?= intval($d[$sf['name']]) ?>"
                                       oninput="updateRange(this, '<?= $sf['name'] ?>')"
                                       style="flex:1;"/>
                                <span class="range-val" id="rv_<?= $sf['name'] ?>"><?= $d[$sf['name']] ?>px</span>
                            </div>
                            <input type="hidden" name="<?= $sf['name'] ?>" id="<?= $sf['name'] ?>" value="<?= htmlspecialchars($d[$sf['name']]) ?>"/>
                            <div class="spacing-preview">
                                <div class="spacing-bar-preview" id="bar_<?= $sf['name'] ?>"
                                     style="width:<?= min(intval($d[$sf['name']]) * 0.12, 200) ?>px;"></div>
                                <span class="spacing-label"><?= $d[$sf['name']] ?>px</span>
                            </div>
                        </div>
                        <?php if ($sf['name'] !== 'nav_item_gap'): ?><hr class="divider"/><?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- ═══════════════════════════
                 05 · BORDER RADIUS
            ═══════════════════════════ -->
            <div class="form-section" id="radius">
                <div class="section-head">
                    <span class="section-num">05</span>
                    <span class="section-title">Border Radius</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Radius Scale</span>
                    </div>
                    <div class="radius-preview-row" id="radiusPreview">
                        <div class="radius-box-wrap">
                            <div class="radius-box" id="rb_none" style="border-radius:0;"></div>
                            <div class="radius-box-label">none · 0px</div>
                        </div>
                        <div class="radius-box-wrap">
                            <div class="radius-box" id="rb_button" style="border-radius:<?= $d['radius_button'] ?>px;"></div>
                            <div class="radius-box-label" id="rl_button">button · <?= $d['radius_button'] ?>px</div>
                        </div>
                        <div class="radius-box-wrap">
                            <div class="radius-box" id="rb_image_sm" style="border-radius:<?= $d['radius_image_sm'] ?>px;"></div>
                            <div class="radius-box-label" id="rl_image_sm">image-sm · <?= $d['radius_image_sm'] ?>px</div>
                        </div>
                        <div class="radius-box-wrap">
                            <div class="radius-box" id="rb_image_lg" style="border-radius:<?= $d['radius_image_lg'] ?>px;"></div>
                            <div class="radius-box-label" id="rl_image_lg">image-lg · <?= $d['radius_image_lg'] ?>px</div>
                        </div>
                    </div>

                    <div class="card-body" style="border-top:1px solid var(--border);">
                        <?php
                        $radii = [
                            ['name'=>'radius_button',   'label'=>'Button Radius',   'id'=>'button'],
                            ['name'=>'radius_image_sm', 'label'=>'Image SM Radius', 'id'=>'image_sm'],
                            ['name'=>'radius_image_lg', 'label'=>'Image LG Radius', 'id'=>'image_lg'],
                        ];
                        foreach ($radii as $r): ?>
                        <div class="field">
                            <label class="field-label"><?= $r['label'] ?></label>
                            <div class="range-row">
                                <input type="range" min="0" max="50"
                                       value="<?= intval($d[$r['name']]) ?>"
                                       oninput="updateRadius('<?= $r['name'] ?>', '<?= $r['id'] ?>', this.value)"
                                       style="flex:1;"/>
                                <span class="range-val" id="rv_<?= $r['name'] ?>"><?= $d[$r['name']] ?>px</span>
                            </div>
                            <input type="hidden" name="<?= $r['name'] ?>" id="<?= $r['name'] ?>" value="<?= htmlspecialchars($d[$r['name']]) ?>"/>
                        </div>
                        <?php if ($r['id'] !== 'image_lg'): ?><hr class="divider"/><?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- ═══════════════════════════
                 06 · BUTTONS
            ═══════════════════════════ -->
            <div class="form-section" id="buttons">
                <div class="section-head">
                    <span class="section-num">06</span>
                    <span class="section-title">Button Component</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Button Labels</span>
                        <span class="pill pill-stable">Stable</span>
                    </div>
                    <div class="card-body">
                        <div class="field">
                            <label class="field-label">Large Button Label</label>
                            <input type="text" name="btn_label_lg" id="btnLg"
                                   value="<?= htmlspecialchars($d['btn_label_lg']) ?>"
                                   oninput="updateBtnPreview()"/>
                        </div>
                        <div class="field">
                            <label class="field-label">Medium Button Label</label>
                            <input type="text" name="btn_label_md" id="btnMd"
                                   value="<?= htmlspecialchars($d['btn_label_md']) ?>"
                                   oninput="updateBtnPreview()"/>
                        </div>
                        <div class="field">
                            <label class="field-label">Small Button Label</label>
                            <input type="text" name="btn_label_sm" id="btnSm"
                                   value="<?= htmlspecialchars($d['btn_label_sm']) ?>"
                                   oninput="updateBtnPreview()"/>
                        </div>

                        <div class="preview-label" style="margin-top:16px;">Live Preview</div>
                        <div class="live-preview-box">
                            <button type="button" id="prev-btn-lg"
                                    style="background:<?= $d['color_primer'] ?>;color:#fff;padding:14px 28px;border-radius:<?= $d['radius_button'] ?>px;border:none;font-family:'Roboto',sans-serif;font-size:16px;cursor:default;text-transform:capitalize;">
                                <?= htmlspecialchars($d['btn_label_lg']) ?>
                            </button>
                            <button type="button" id="prev-btn-md"
                                    style="background:<?= $d['color_primer'] ?>;color:#fff;padding:10px 20px;border-radius:<?= $d['radius_button'] ?>px;border:none;font-family:'Roboto',sans-serif;font-size:13px;cursor:default;text-transform:capitalize;">
                                <?= htmlspecialchars($d['btn_label_md']) ?>
                            </button>
                            <button type="button" id="prev-btn-sm"
                                    style="background:<?= $d['color_primer'] ?>;color:#fff;padding:7px 14px;border-radius:<?= $d['radius_button'] ?>px;border:none;font-family:'Roboto',sans-serif;font-size:11px;cursor:default;text-transform:capitalize;">
                                <?= htmlspecialchars($d['btn_label_sm']) ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ═══════════════════════════
                 07 · NAVBAR
            ═══════════════════════════ -->
            <div class="form-section" id="navbar">
                <div class="section-head">
                    <span class="section-num">07</span>
                    <span class="section-title">Navbar</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Navbar Content</span>
                        <span class="pill pill-stable">Stable</span>
                    </div>
                    <div class="card-body">
                        <div class="field">
                            <label class="field-label">Logo / Brand Name</label>
                            <input type="text" name="navbar_logo" id="navLogo"
                                   value="<?= htmlspecialchars($d['navbar_logo']) ?>"
                                   oninput="updateNavPreview()"/>
                        </div>
                        <div class="field">
                            <label class="field-label">Nav Links <span style="color:var(--muted);font-weight:400;">(satu per baris)</span></label>
                            <textarea name="navbar_links" id="navLinks" rows="4"
                                      oninput="updateNavPreview()"><?= htmlspecialchars($d['navbar_links']) ?></textarea>
                            <div class="field-hint">Pisahkan tiap link dengan Enter. Maksimal 6 item.</div>
                        </div>

                        <div class="preview-label" style="margin-top:16px;">Live Preview</div>
                        <div style="padding:12px;background:#f5f5f5;border-radius:8px;margin-top:6px;">
                            <div id="navbarPreview"
                                 style="background:<?= $d['color_primer'] ?>;padding:10px 20px;border-radius:6px;display:flex;align-items:center;justify-content:space-between;">
                                <span id="prev-logo"
                                      style="font-family:'Roboto',sans-serif;font-weight:700;font-size:16px;color:<?= $d['color_background'] ?>">
                                    <?= htmlspecialchars($d['navbar_logo']) ?>
                                </span>
                                <div id="prev-links"
                                     style="display:flex;gap:16px;font-family:'Roboto',sans-serif;font-size:12px;color:<?= $d['color_background'] ?>;opacity:0.9;">
                                    <?php foreach (explode("\n", $d['navbar_links']) as $link): ?>
                                    <span><?= htmlspecialchars(trim($link)) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ═══════════════════════════
                 08 · ICONS
            ═══════════════════════════ -->
            <div class="form-section" id="icons">
                <div class="section-head">
                    <span class="section-num">08</span>
                    <span class="section-title">Icons</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Icon Inventory</span>
                        <span class="badge">7 items</span>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="icons-table">
                            <thead>
                                <tr>
                                    <th>Token Name</th>
                                    <th>Context</th>
                                    <th>Size (px)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $icons = [
                                    ['token'=>'icon-plus',      'ctx'=>'FAQ accordion toggle',    'sz'=>'18'],
                                    ['token'=>'icon-checkmark',  'ctx'=>'Why Maxim feature list', 'sz'=>'40'],
                                    ['token'=>'icon-play',       'ctx'=>'Video overlay button',   'sz'=>'70'],
                                    ['token'=>'icon-arrow',      'ctx'=>'Results section CTA',    'sz'=>'73'],
                                    ['token'=>'icon-instagram',  'ctx'=>'Footer social links',    'sz'=>'24.57'],
                                    ['token'=>'icon-facebook',   'ctx'=>'Footer social links',    'sz'=>'24.57'],
                                    ['token'=>'icon-whatsapp',   'ctx'=>'Footer social links',    'sz'=>'24.57'],
                                ];
                                foreach ($icons as $i => $icon): ?>
                                <tr>
                                    <td>
                                        <input type="text" name="icon_token_<?= $i ?>"
                                               value="<?= isset($data["icon_token_$i"]) ? htmlspecialchars($data["icon_token_$i"]) : $icon['token'] ?>"/>
                                    </td>
                                    <td>
                                        <input type="text" name="icon_ctx_<?= $i ?>"
                                               value="<?= isset($data["icon_ctx_$i"]) ? htmlspecialchars($data["icon_ctx_$i"]) : $icon['ctx'] ?>"/>
                                    </td>
                                    <td>
                                        <input type="text" name="icon_sz_<?= $i ?>"
                                               value="<?= isset($data["icon_sz_$i"]) ? htmlspecialchars($data["icon_sz_$i"]) : $icon['sz'] ?>"
                                               style="width:80px;"/>
                                    </td>
                                    <td><span class="pill pill-stable">Stable</span></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ═══════════════════════════
                 09 · CHANGELOG
            ═══════════════════════════ -->
            <div class="form-section" id="changelog">
                <div class="section-head">
                    <span class="section-num">09</span>
                    <span class="section-title">Changelog</span>
                </div>

                <div class="card">
                    <div class="card-head">
                        <span class="card-label">Version History</span>
                    </div>
                    <div class="card-body">
                        <div class="field">
                            <label class="field-label">Changelog Entries</label>
                            <textarea name="changelog" rows="6"><?= htmlspecialchars($d['changelog']) ?></textarea>
                            <div class="changelog-hint">
                                Format tiap baris: <code style="font-family:monospace;color:var(--accent);">v1.0.0 | Mar 2026 | Deskripsi perubahan</code>
                            </div>
                        </div>
                        <div class="field" style="margin-top:16px;">
                            <label class="field-label">Contribution Guidelines</label>
                            <textarea name="contribution_note" rows="3"><?= htmlspecialchars($d['contribution_note']) ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit at bottom -->
                <div style="display:flex;gap:12px;justify-content:flex-end;margin-top:32px;padding-top:24px;border-top:1px solid var(--border);">
                    <a href="preview.php" target="_blank" class="btn-preview" style="font-size:13px;padding:10px 20px;">↗ Open Preview</a>
                    <button type="button" class="btn-save" onclick="submitForm()" style="font-size:13px;padding:10px 24px;">
                        ✦ Save &amp; Generate
                    </button>
                </div>
            </div>

        </form>
    </main>
</div>

<script>
// ── SCROLL NAV ──
function scrollTo(id) {
    document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
    event.currentTarget.classList.add('active');
}

// Observe sections for active nav highlight
const sections = document.querySelectorAll('.form-section');
const navLinks  = document.querySelectorAll('.nav-link');
const sectionMap = { meta:0, colors:1, typography:2, spacing:3, radius:4, buttons:5, navbar:6, icons:7, changelog:8 };

const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            const idx = sectionMap[e.target.id];
            if (idx !== undefined) {
                navLinks.forEach(l => l.classList.remove('active'));
                navLinks[idx]?.classList.add('active');
            }
        }
    });
}, { threshold: 0.3 });
sections.forEach(s => observer.observe(s));

// ── TOAST ──
<?php if ($saved === '1'): ?>
window.addEventListener('load', () => showToast());
<?php endif; ?>

function showToast() {
    const t = document.getElementById('toast');
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3500);
}

// ── SUBMIT ──
function submitForm() {
    document.getElementById('cms-form').submit();
}

// ── COLOR SYNC ──
function syncColor(field, swatchId, hex) {
    document.getElementById('txt_' + field).value = hex.toUpperCase();
    document.getElementById('swatch-' + swatchId).style.background = hex;
    document.getElementById('hex-' + swatchId).textContent = hex.toUpperCase();
    updateButtonColors();
    updateNavbarColors();
}

function syncColorFromText(field, swatchId, input) {
    const hex = input.value;
    if (/^#[0-9A-Fa-f]{6}$/.test(hex)) {
        document.getElementById('swatch-' + swatchId).style.background = hex;
        document.getElementById('hex-' + swatchId).textContent = hex.toUpperCase();
        // sync color picker
        input.previousElementSibling.value = hex;
        updateButtonColors();
        updateNavbarColors();
    }
}

function updateButtonColors() {
    const primer = document.getElementById('txt_color_primer')?.value || '#8B3734';
    const radius = document.getElementById('radius_button')?.value || 15;
    ['prev-btn-lg','prev-btn-md','prev-btn-sm'].forEach(id => {
        const btn = document.getElementById(id);
        if (btn) {
            btn.style.background = primer;
            btn.style.borderRadius = radius + 'px';
        }
    });
}

function updateNavbarColors() {
    const primer = document.getElementById('txt_color_primer')?.value || '#8B3734';
    const cream  = document.getElementById('txt_color_background')?.value || '#FDF5EB';
    const nav = document.getElementById('navbarPreview');
    const logo = document.getElementById('prev-logo');
    const links = document.getElementById('prev-links');
    if (nav) nav.style.background = primer;
    if (logo) logo.style.color = cream;
    if (links) links.style.color = cream;
}

// ── RANGE INPUTS ──
function updateRange(input, fieldId) {
    const val = input.value;
    document.getElementById(fieldId).value = val;
    const rv = document.getElementById('rv_' + fieldId);
    if (rv) rv.textContent = val + 'px';

    // Update spacing bar if exists
    const bar = document.getElementById('bar_' + fieldId);
    if (bar) {
        bar.style.width = Math.min(val * 0.12, 200) + 'px';
        bar.nextElementSibling.textContent = val + 'px';
    }

    // Update button radius preview
    if (fieldId === 'radius_button') {
        ['prev-btn-lg','prev-btn-md','prev-btn-sm'].forEach(id => {
            const btn = document.getElementById(id);
            if (btn) btn.style.borderRadius = val + 'px';
        });
    }
}

// ── RADIUS PREVIEW ──
function updateRadius(fieldId, boxId, val) {
    document.getElementById(fieldId).value = val;
    document.getElementById('rv_' + fieldId).textContent = val + 'px';
    document.getElementById('rb_' + boxId).style.borderRadius = val + 'px';
    const lbl = document.getElementById('rl_' + boxId);
    if (lbl) lbl.textContent = boxId.replace('_','-') + ' · ' + val + 'px';

    if (fieldId === 'radius_button') updateButtonColors();
}

// ── BUTTON PREVIEW ──
function updateBtnPreview() {
    const lg = document.getElementById('btnLg').value;
    const md = document.getElementById('btnMd').value;
    const sm = document.getElementById('btnSm').value;
    document.getElementById('prev-btn-lg').textContent = lg;
    document.getElementById('prev-btn-md').textContent = md;
    document.getElementById('prev-btn-sm').textContent = sm;
}

// ── NAVBAR PREVIEW ──
function updateNavPreview() {
    const logo  = document.getElementById('navLogo').value;
    const links = document.getElementById('navLinks').value.split('\n').filter(l => l.trim());
    document.getElementById('prev-logo').textContent = logo;
    const prevLinks = document.getElementById('prev-links');
    prevLinks.innerHTML = links.map(l =>
        `<span style="font-family:'Roboto',sans-serif;font-size:12px;">${l.trim()}</span>`
    ).join('');
}
</script>

</body>
</html>
