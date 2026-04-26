<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>MAXIM — Design System v1.0.0</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&family=Inter:wght@300;400;500&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
:root{
  --color-background:#FDF5EB;
  --color-primer:#8B3734;
  --color-primer-dark:#8B3734;
  --color-dark:#000000;
  --color-light:#FFFFFF;
  --doc-bg:#0f0f0f;
  --doc-surface:#161616;
  --doc-border:#2a2a2a;
  --doc-muted:#666;
  --doc-text:#e8e8e8;
  --doc-accent:#8B3734;
  --font-brand:'Roboto',sans-serif;
  --font-body:'Inter',sans-serif;
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
    <div class="brand">MAXIM</div>
    <div class="version">Design System · v1.0.0</div>
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
    <h1>MAXIM Hair<br>Design System</h1>
    <p>A single source of truth for designers and developers. All design decisions — color, typography, spacing, components — documented here for consistency across every touchpoint.</p>
    <div class="meta-row">
      <div class="meta-item"><span class="meta-label">Version</span><span class="meta-value">v1.0.0</span></div>
      <div class="meta-item"><span class="meta-label">Figma File</span><span class="meta-value">MAXIM-WEBSITE</span></div>
      <div class="meta-item"><span class="meta-label">Framework</span><span class="meta-value">React + Tailwind</span></div>
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
                <div class="color-swatch">
          <div class="swatch-block" style="background:#FDF5EB;"></div>
          <div class="swatch-meta">
            <div class="swatch-token">color.background</div>
            <div class="swatch-hex">#FDF5EB</div>
            <div class="swatch-desc">Latar belakang utama halaman — krem hangat</div>
          </div>
        </div>
                <div class="color-swatch">
          <div class="swatch-block" style="background:#8B3734;"></div>
          <div class="swatch-meta">
            <div class="swatch-token">color.primer</div>
            <div class="swatch-hex">#8B3734</div>
            <div class="swatch-desc">Warna brand utama — navbar, tombol, aksen</div>
          </div>
        </div>
                <div class="color-swatch">
          <div class="swatch-block" style="background:#000000;"></div>
          <div class="swatch-meta">
            <div class="swatch-token">color.dark</div>
            <div class="swatch-hex">#000000</div>
            <div class="swatch-desc">Teks utama — judul dan body text</div>
          </div>
        </div>
                <div class="color-swatch">
          <div class="swatch-block" style="background:#FFFFFF;border-bottom:1px solid #333;"></div>
          <div class="swatch-meta">
            <div class="swatch-token">color.light</div>
            <div class="swatch-hex">#FFFFFF</div>
            <div class="swatch-desc">Putih — background kartu, teks di atas primer</div>
          </div>
        </div>
              </div>
    </div>
    <div class="card">
      <div class="card-header"><span class="card-title">CSS Custom Properties</span><span class="badge">globals.css</span></div>
      <div class="code-block"><span class="cc">/* globals.css */</span>
<span class="ck">:root</span> {
  <span class="ck">--color-background</span>: <span class="cs">#FDF5EB</span>;
  <span class="ck">--color-primer</span>:     <span class="cs">#8B3734</span>;
  <span class="ck">--color-dark</span>:       <span class="cs">#000000</span>;
  <span class="ck">--color-light</span>:      <span class="cs">#FFFFFF</span>;
}</div>
    </div>
  </section>

  <!-- 02 TYPOGRAPHY -->
  <section class="section" id="typography">
    <div class="section-header">
      <span class="section-number">02</span>
      <h2 class="section-title">Typography</h2>
    </div>
    <p class="section-desc">Dua font family: <strong style="color:#e8e8e8">Roboto</strong> sebagai brand font utama, <strong style="color:#e8e8e8">Inter</strong> sebagai font sekunder.</p>
    <div class="card">
      <div class="card-header"><span class="card-title">Type Scale</span><span class="badge">5 styles</span></div>
      <div class="type-grid">
                <div class="type-row">
          <span class="type-label">typography.h1</span>
          <span class="type-preview" style="font-family:'Roboto',sans-serif;font-weight:600;font-size:38px;line-height:1.1;">Hair Restoration</span>
          <div class="type-specs">
            <span class="type-spec-item">Roboto SemiBold</span>
            <span class="type-spec-item">75px / 100%</span>
            <span class="type-spec-item">weight: 600</span>
          </div>
        </div>
                <div class="type-row">
          <span class="type-label">typography.logo</span>
          <span class="type-preview" style="font-family:'Roboto',sans-serif;font-weight:700;font-size:32px;line-height:1.1;">maxim hair</span>
          <div class="type-specs">
            <span class="type-spec-item">Roboto Bold</span>
            <span class="type-spec-item">32px / 100%</span>
            <span class="type-spec-item">weight: 700</span>
          </div>
        </div>
                <div class="type-row">
          <span class="type-label">typography.h4</span>
          <span class="type-preview" style="font-family:'Inter',sans-serif;font-weight:400;font-size:24px;line-height:1.1;">Surgical &amp; non-surgical hair restoration.</span>
          <div class="type-specs">
            <span class="type-spec-item">Inter Regular</span>
            <span class="type-spec-item">24px / 100%</span>
            <span class="type-spec-item">weight: 400</span>
          </div>
        </div>
                <div class="type-row">
          <span class="type-label">typography.h5</span>
          <span class="type-preview" style="font-family:'Roboto',sans-serif;font-weight:400;font-size:20px;line-height:1.1;">Submit photos · Free consult · Chat now</span>
          <div class="type-specs">
            <span class="type-spec-item">Roboto Regular</span>
            <span class="type-spec-item">20px / 100%</span>
            <span class="type-spec-item">weight: 400</span>
          </div>
        </div>
                <div class="type-row">
          <span class="type-label">typography.button</span>
          <span class="type-preview" style="font-family:'Roboto',sans-serif;font-weight:400;font-size:24px;line-height:1.1;">More Before &amp;amp; After</span>
          <div class="type-specs">
            <span class="type-spec-item">Roboto Regular</span>
            <span class="type-spec-item">24px / 100%</span>
            <span class="type-spec-item">weight: 400</span>
          </div>
        </div>
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
                <div class="spacing-row">
          <span class="spacing-token">spacing.page-width</span>
          <span class="spacing-desc">Lebar maksimum halaman</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:102.4px;"></div>
            <span class="spacing-value">1280px</span>
          </div>
        </div>
                <div class="spacing-row">
          <span class="spacing-token">spacing.content-width</span>
          <span class="spacing-desc">Lebar konten inner</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:92.8px;"></div>
            <span class="spacing-value">1160px</span>
          </div>
        </div>
                <div class="spacing-row">
          <span class="spacing-token">spacing.page-padding-h</span>
          <span class="spacing-desc">Padding kiri & kanan halaman</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:4.8px;"></div>
            <span class="spacing-value">60px</span>
          </div>
        </div>
                <div class="spacing-row">
          <span class="spacing-token">spacing.section-gap</span>
          <span class="spacing-desc">Jarak vertikal antar section</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:6.4px;"></div>
            <span class="spacing-value">80px</span>
          </div>
        </div>
                <div class="spacing-row">
          <span class="spacing-token">spacing.card-gap</span>
          <span class="spacing-desc">Jarak antar kartu dalam grid</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:0.88px;"></div>
            <span class="spacing-value">11px</span>
          </div>
        </div>
                <div class="spacing-row">
          <span class="spacing-token">spacing.btn-padding-h</span>
          <span class="spacing-desc">Padding horizontal tombol besar</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:2.56px;"></div>
            <span class="spacing-value">32px</span>
          </div>
        </div>
                <div class="spacing-row">
          <span class="spacing-token">spacing.btn-padding-v</span>
          <span class="spacing-desc">Padding vertikal tombol besar</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:1.36px;"></div>
            <span class="spacing-value">17px</span>
          </div>
        </div>
                <div class="spacing-row">
          <span class="spacing-token">spacing.nav-item-gap</span>
          <span class="spacing-desc">Jarak antar item navigasi</span>
          <div class="spacing-bar-wrap">
            <div class="spacing-bar" style="width:3.2px;"></div>
            <span class="spacing-value">40px</span>
          </div>
        </div>
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
                <div style="text-align:center;">
          <div style="width:60px;height:60px;background:#8B3734;border-radius:0px;margin:0 auto 8px;"></div>
          <div style="font-family:'DM Mono',monospace;font-size:11px;color:#8B3734;">radius.none</div>
          <div style="font-size:11px;color:#666;">0px</div>
        </div>
                <div style="text-align:center;">
          <div style="width:60px;height:60px;background:#8B3734;border-radius:15px;margin:0 auto 8px;"></div>
          <div style="font-family:'DM Mono',monospace;font-size:11px;color:#8B3734;">radius.button</div>
          <div style="font-size:11px;color:#666;">15px</div>
        </div>
                <div style="text-align:center;">
          <div style="width:60px;height:60px;background:#8B3734;border-radius:27px;margin:0 auto 8px;"></div>
          <div style="font-family:'DM Mono',monospace;font-size:11px;color:#8B3734;">radius.image-sm</div>
          <div style="font-size:11px;color:#666;">27px</div>
        </div>
                <div style="text-align:center;">
          <div style="width:60px;height:60px;background:#8B3734;border-radius:36px;margin:0 auto 8px;"></div>
          <div style="font-family:'DM Mono',monospace;font-size:11px;color:#8B3734;">radius.image-lg</div>
          <div style="font-size:11px;color:#666;">36px</div>
        </div>
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
        <button style="background:#8B3734;color:#FFFFFF;padding:17px 32px;border-radius:15px;border:none;font-family:'Roboto',sans-serif;font-size:20px;font-weight:400;cursor:default;text-transform:capitalize;">
          More Before &amp;amp; After        </button>
        <button style="background:#8B3734;color:#FFFFFF;padding:11.9px 24px;border-radius:15px;border:none;font-family:'Roboto',sans-serif;font-size:14px;font-weight:400;cursor:default;text-transform:capitalize;">
          Free Consult        </button>
        <button style="background:#8B3734;color:#FFFFFF;padding:8px 14px;border-radius:15px;border:none;font-family:'Roboto',sans-serif;font-size:12px;font-weight:400;cursor:default;text-transform:capitalize;">
          Get Directions        </button>
      </div>
      <div class="code-block"><span class="cc">/* btn-primer — Large */</span>
<span class="ck">&lt;button</span> className=<span class="cs">"bg-[#8B3734] text-white px-[32px] py-[17px] rounded-[15px]
         font-['Roboto'] text-[24px] capitalize"</span><span class="ck">&gt;</span>
  More Before &amp;amp; After<span class="ck">&lt;/button&gt;</span></div>
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
        <div style="background:#8B3734;padding:12px 24px;border-radius:8px;display:flex;align-items:center;justify-content:space-between;">
          <span style="font-family:'Roboto',sans-serif;font-weight:700;font-size:32px;color:#FDF5EB;">
            maxim hair          </span>
          <div style="display:flex;gap:40px;font-family:'Roboto',sans-serif;font-size:20px;color:#FDF5EB;opacity:.9;">
                        <span>submit photos</span>
                        <span>free consult</span>
                        <span>chat now</span>
                        <span>whatsApp</span>
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
      <div class="card-header"><span class="card-title">Icon Inventory</span><span class="badge">7 items</span></div>
      <div style="overflow-x:auto;">
        <table class="usage-table">
          <thead><tr><th>Token Name</th><th>Context</th><th>Size</th><th>Format</th><th>Status</th></tr></thead>
          <tbody>
                        <tr>
              <td class="mono">icon-plus</td>
              <td>FAQ accordion toggle</td>
              <td>18px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
                        <tr>
              <td class="mono">icon-checkmark</td>
              <td>Why Maxim feature list</td>
              <td>40px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
                        <tr>
              <td class="mono">icon-play</td>
              <td>Video overlay button</td>
              <td>70px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
                        <tr>
              <td class="mono">icon-arrow</td>
              <td>Results section CTA</td>
              <td>73px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
                        <tr>
              <td class="mono">icon-instagram</td>
              <td>Footer social links</td>
              <td>24.57px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
                        <tr>
              <td class="mono">icon-facebook</td>
              <td>Footer social links</td>
              <td>24.57px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
                        <tr>
              <td class="mono">icon-whatsapp</td>
              <td>Footer social links</td>
              <td>24.57px</td>
              <td>SVG inline</td>
              <td><span class="pill pill-stable">Stable</span></td>
            </tr>
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
          <button style="background:#8B3734;color:#FFFFFF;padding:10px 20px;border-radius:15px;border:none;font-family:'Roboto',sans-serif;font-size:14px;text-transform:capitalize;">
            Free Consult          </button>
        </div>
        <div class="note"></div>
      </div>
      <div class="dont-card">
        <div class="tag">✕ Don't</div>
        <div class="preview">
          <button style="background:#2563eb;color:white;padding:10px 20px;border-radius:4px;border:none;font-size:14px;">
            Free Consult          </button>
        </div>
        <div class="note"></div>
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
            <tr><td class="mono">color.background</td><td>#FDF5EB</td><td>Page bg, hero section</td><td class="mono">bg-[#FDF5EB]</td></tr>
            <tr><td class="mono">color.primer</td><td>#8B3734</td><td>Navbar bg, all buttons, accents</td><td class="mono">bg-[#8B3734]</td></tr>
            <tr><td class="mono">color.dark</td><td>#000000</td><td>All headings, body text</td><td class="mono">text-[#000000]</td></tr>
            <tr><td class="mono">color.light</td><td>#FFFFFF</td><td>Button text, card backgrounds</td><td class="mono">text-white</td></tr>
            <tr><td class="mono">typography.h1</td><td>Roboto 600 75px</td><td>Hero headline, section titles</td><td class="mono">font-['Roboto'] text-[75px]</td></tr>
            <tr><td class="mono">typography.h4</td><td>Inter 400 24px</td><td>Hero subheading, card descriptions</td><td class="mono">font-['Inter'] text-[24px]</td></tr>
            <tr><td class="mono">typography.h5</td><td>Roboto 400 20px</td><td>Nav links, list items</td><td class="mono">font-['Roboto'] text-[20px]</td></tr>
            <tr><td class="mono">borderRadius.button</td><td>15px</td><td>All btn-primer variants</td><td class="mono">rounded-[15px]</td></tr>
            <tr><td class="mono">borderRadius.image-sm</td><td>27px</td><td>Hero grid images, result cards</td><td class="mono">rounded-[27px]</td></tr>
            <tr><td class="mono">spacing.content-width</td><td>1160px</td><td>Inner wrapper semua section</td><td class="mono">w-[1160px]</td></tr>
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
                <div class="changelog-entry">
          <span class="cl-version">v1.0.0</span>
          <span class="cl-date">Mar 2026</span>
          <span class="cl-desc">Initial release. Color tokens, typography scale, spacing system, border radius, semua komponen utama.</span>
        </div>
                <div class="changelog-entry">
          <span class="cl-version">v0.9.0</span>
          <span class="cl-date">Feb 2026</span>
          <span class="cl-desc">Design audit dari Figma file MAXIM-WEBSITE.</span>
        </div>
              </div>
    </div>
        <div style="margin-top:24px;padding:24px;background:rgba(139,55,52,.08);border:1px solid rgba(139,55,52,.2);border-radius:12px;">
      <div style="font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#8B3734;margin-bottom:8px;">Contribution Guidelines</div>
      <p style="font-size:13px;color:#aaa;line-height:1.7;">Setiap perubahan pada design system harus melalui review dari minimal 1 designer dan 1 developer. Update token di Tokens Studio terlebih dahulu, kemudian update file ini, lalu bump versi menggunakan semantic versioning (MAJOR.MINOR.PATCH).</p>
    </div>
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
