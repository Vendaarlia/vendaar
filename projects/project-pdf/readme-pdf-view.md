URL tersebut tidak muncul secara ajaib, melainkan **kamu yang membuatnya** di halaman utama (seperti `index.html`) sebagai penghubung ke halaman viewer.

Berikut adalah penjelasan "anatomi" dari mana asal-usul link tersebut:

### 1. Bagian URL (`viewer.html?project=...`)

Ini disebut sebagai  **Query Parameter** .

* `viewer.html`: Nama file yang kita buat sebelumnya.
* `?project=`: "Pintu" informasi yang akan dibaca oleh JavaScript.
* `borgo-ds`: **Slug** atau ID unik yang kamu tentukan sendiri.

---

### 2. Dibuat di Halaman Utama (`index.html`)

Kamu harus memasang link ini pada elemen yang bisa diklik (seperti kartu atau tombol di bagian portfolio kamu). Berdasarkan `styles.css` yang kamu berikan, kamu bisa menerapkannya pada `.card` atau `.btn`:

**HTML**

```
<div class="cards-wrapper">
    <a href="viewer.html?project=borgo-ds" class="card card-linkedin">
        <div class="card-title">Borgo <strong>Project</strong></div>
        <div class="card-desc-box">
            <p>Klik untuk melihat detail Design System.</p>
        </div>
    </a>

    <a href="viewer.html?project=maxim-ds" class="card card-fiverr">
        <div class="card-title">Maxim <strong>Project</strong></div>
    </a>
</div>
```

---

### 3. Dicocokkan dengan `manifest.json`

Agar link tersebut berhasil menampilkan PDF, kata `borgo-ds` atau `maxim-ds` harus ada di dalam file `manifest.json` yang kamu buat.

**Isi `manifest.json` kamu harus seperti ini:**

**JSON**

```
{
  "borgo-ds": "/projects/contents/borgo-ds-css.pdf",
  "maxim-ds": "/projects/contents/maxim-ds-css.pdf"
}
```

*Jika di URL tertulis `?project=borgo-ds`, maka JavaScript akan mencari kunci `"borgo-ds"` di JSON tersebut untuk mendapatkan path file `/projects/contents/borgo-ds-css.pdf`.*

---

### 4. Dibaca oleh JavaScript di `viewer.html`

Di dalam file `viewer.html` yang saya berikan sebelumnya, baris kode inilah yang bertugas mengambil kata tersebut dari URL:

**JavaScript**

```
const urlParams = new URLSearchParams(window.location.search);
const slug = urlParams.get('project'); // Hasilnya: "borgo-ds"
```

> **Singkatnya:** Kamu menentukan "nama panggilan" (slug) di `manifest.json`, lalu kamu buat link manual di halaman depan dengan format `viewer.html?project=nama-panggilan-tadi`.

Sudah cukup jelas atau ada bagian dari alur "oper data" ini yang masih membingungkan?
