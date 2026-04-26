
## Cara Pakai navbar js

### 1. Load file

```html
<script src="navbar.js"></script>
<div id="navbar"></div>
```

---

### 2. Auto-init via `data-navbar` (paling cepat)

```html
<nav data-navbar
     data-logo="Studio"
     data-logo-href="/"
     data-links='[{"text":"About","href":"/about"},{"text":"Works","href":"/works.php"}]'
     data-cta-text="Contact"
     data-cta-href="#contact">
</nav>
```

---

### 3. JS API (kontrol penuh)

```js
const nav = Navbar('#mainNav', {
  logo:        'Studio',
  logoHref:    '/',
  links: [
    { text: 'About', href: '/about' },
    { text: 'Works', href: '/works.php', active: true },
    { text: 'VR',    href: '#' },
  ],
  ctaText:      'Contact',
  ctaHref:      '#contact',
  accentColor:  '#1a1a1a',   // warna teks & border
  hoverColor:   '#1a1a1a',   // warna hover CTA
  scrollEffect: true,        // shadow muncul saat scroll
  onLinkClick(href, text, e) { ... },
  onCtaClick(e) { ... },
});
```

---

### Public API yang tersedia

| Method                           | Fungsi                        |
| -------------------------------- | ----------------------------- |
| `nav.setLogo(html)`            | Ganti logo (support HTML)     |
| `nav.setLinks(array)`          | Update daftar link            |
| `nav.setActive(href)`          | Set link aktif                |
| `nav.autoActive()`             | Auto-detect dari URL saat ini |
| `nav.setCta(text, href)`       | Ganti CTA button              |
| `nav.setColors(accent, hover)` | Ganti warna tema              |
| `nav.openDrawer()`             | Buka mobile menu              |
| `nav.closeDrawer()`            | Tutup mobile menu             |
| `nav.destroy()`                | Hapus navbar dari DOM         |

**Fitur bawaan:** fixed position, backdrop blur, scroll shadow, mobile hamburger + drawer animasi, entry animation, active link highlight.


# JS API

ini apa sih emang harus di masukan ke html??? atau tidak perlu???

**Tidak harus.**

JS API itu **opsional** — hanya dipakai kalau kamu mau kontrol navbar secara dinamis dari JavaScript, misalnya:

* Ganti warna tema setelah user login
* Set link aktif berdasarkan halaman yang sedang dibuka
* Ganti teks CTA secara programatik

---

**Kalau kamu cuma mau pasang navbar biasa, cukup ini saja:**

```html
<!DOCTYPE html>
<html>
<head>...</head>
<body>

  <!-- 1. Taruh elemen ini -->
  <nav data-navbar
       data-logo="Studio"
       data-cta-text="Contact"
       data-cta-href="#contact"
       data-links='[
         {"text":"About","href":"/about"},
         {"text":"Works","href":"/works.php"},
         {"text":"VR","href":"#"}
       ]'>
  </nav>

  <!-- Konten halaman kamu -->

  <!-- 2. Load file-nya di akhir body -->
  <script src="navbar.js"></script>

</body>
</html>
```

Selesai. Tidak perlu nulis JS apapun lagi — navbar langsung muncul otomatis.



Dua file siap pakai — `rating.js` (component) dan `demo.html` (contoh pemakaian).

---

# Cara pakai Rings component

## **1. Load file-nya**

```html
<script src="rating.js"></script>
```

---

## **2. Auto-init via `data-rating` (paling mudah)**

```html
<div data-rating
     data-value="4"
     data-total="5"
     data-size="16"
     data-theme="dark"
     data-label="/ 5"
     data-readonly="false"
     data-show-number="true">
</div>
```

Tinggal taruh di HTML, langsung jalan tanpa JS tambahan.

---

## **3. JS API (untuk kontrol lebih)**

```js
const r = Rating(document.getElementById("myRating"), {
  value:  3,
  total:  5,
  theme:  "light",
  label:  "(120 ulasan)",
  onChange(val) {
    console.log("Rating dipilih:", val);
  }
});

r.getValue();   // → angka saat ini
r.setValue(4);  // → set nilai
r.reset();      // → reset ke 0
r.destroy();    // → hapus dari DOM
```

---

**Semua opsi:**

| Opsi           | Default    | Keterangan            |
| -------------- | ---------- | --------------------- |
| `value`      | `0`      | Nilai awal            |
| `total`      | `5`      | Jumlah bintang        |
| `size`       | `16`     | Ukuran px             |
| `readonly`   | `false`  | Hanya tampil          |
| `showNumber` | `true`   | Tampilkan angka       |
| `label`      | `""`     | Teks tambahan         |
| `theme`      | `"dark"` | `dark`/`light`    |
| `onChange`   | `null`   | Callback saat berubah |
