# Design System CMS — MAXIM

CMS sederhana berbasis PHP untuk mengedit dan men-generate halaman dokumentasi Design System.

## File Structure

```
design-system-cms/
├── index.php       ← Editor / Form CMS
├── save.php        ← Backend: simpan data & generate HTML
├── preview.php     ← Output HTML (auto-generated, jangan edit manual)
├── data/
│   └── design-system.json  ← Data tersimpan (auto-generated)
└── README.md
```

## Setup

### Requirements
- PHP 7.4+ (atau PHP 8.x)
- Web server: Apache / Nginx / XAMPP / Laragon / php -S

### Cara Menjalankan

**Option 1 — PHP Built-in Server (paling mudah):**
```bash
cd design-system-cms
php -S localhost:8080
```
Buka browser: http://localhost:8080

**Option 2 — XAMPP / Laragon:**
- Copy folder `design-system-cms/` ke `htdocs/` (XAMPP) atau `www/` (Laragon)
- Buka: http://localhost/design-system-cms/

**Option 3 — Upload ke hosting:**
- Upload semua file via FTP
- Pastikan folder `data/` bisa ditulis (chmod 755)
- Buka: https://yourdomain.com/design-system-cms/

## Cara Penggunaan

1. Buka `index.php` di browser
2. Edit token warna, tipografi, spacing, komponen, dll
3. Semua perubahan terlihat **live preview** langsung
4. Klik **"Save & Generate"** untuk menyimpan dan men-generate `preview.php`
5. Klik **"↗ Preview"** untuk melihat hasil dokumentasi

## Fitur

- ✅ Live color picker + hex sync
- ✅ Range slider untuk font size & spacing
- ✅ Live preview button, navbar, dan warna
- ✅ Generate HTML dokumentasi otomatis
- ✅ Data disimpan di JSON (persistent)
- ✅ Sidebar navigasi dengan active state
- ✅ Toast notification saat berhasil save

## Catatan

- File `preview.php` di-overwrite setiap kali kamu klik Save
- Data disimpan di `data/design-system.json`
- Jangan edit `preview.php` secara manual — akan tertimpa saat save berikutnya
