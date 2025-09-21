# 📸 Instagram Profile Clone

Proyek ini adalah sebuah halaman web statis yang mereplikasi tampilan **profil Instagram** menggunakan **HTML** dan **Bootstrap 5**.  
Tujuan proyek ini adalah untuk mempelajari bagaimana membangun **UI responsif** dengan memanfaatkan sistem grid, flexbox utilities, dan komponen Bootstrap.

---

## 🚀 Teknologi yang Digunakan
- **HTML5** → Struktur dasar halaman.
- **Bootstrap 5.3.3 (CDN)** → Membantu dalam layout, grid, dan styling cepat.
- **CSS Custom** → Untuk menambahkan beberapa penyesuaian seperti ukuran foto profil dan post.

---

## 📂 Struktur Halaman
Halaman ini terdiri dari dua bagian utama:

1. **Profile Section**
   - Menampilkan foto profil berbentuk lingkaran (`rounded-circle`).
   - Nama pengguna, tombol aksi (Edit Profile, View Archive).
   - Informasi jumlah post, followers, dan following.
   - Bio pengguna.

2. **Posts Grid**
   - Galeri foto dengan layout grid responsif.
   - Menggunakan sistem **row** dan **col** dari Bootstrap.
   - Setiap gambar post otomatis menyesuaikan ukuran kolom.

---

## 🔑 Penggunaan Bootstrap dalam Proyek

### 1. Sistem Grid
Bootstrap grid digunakan untuk membagi layout menjadi beberapa bagian responsif.

- `class="container"` → pembungkus utama halaman.
- `class="row"` → membuat baris.
- `class="col-md-3"` dan `class="col-md-9"` → membagi bagian profil menjadi 2 kolom.
- `class="col-12 col-sm-6 col-md-4"` → membuat galeri foto agar tampil 1 kolom di mobile, 2 kolom di tablet, dan 3 kolom di desktop.

### 2. Flexbox Utilities
Digunakan untuk menyusun item secara sejajar dan rapi.

- `d-flex` → menjadikan elemen sebagai flex container.
- `align-items-center` → menyelaraskan elemen secara vertikal di tengah.
- `me-3`, `me-2` → memberikan margin kanan untuk memberi jarak antar elemen.

### 3. Komponen dan Utilities
- **Tombol** → `btn btn-outline-light btn-sm` digunakan untuk membuat tombol kecil dengan border putih.
- **Gambar Profil** → `rounded-circle` membuat gambar berbentuk lingkaran.
- **Gambar Post** → dikustomisasi dengan CSS (`object-fit: cover`) agar foto proporsional.

### 4. Spacing dan Tipografi
- `mb-5`, `mb-3`, `py-5` → memberikan margin/padding dengan cepat.
- `fw-bold` → menebalkan teks nama profil.
- `text-secondary small` → memberi warna abu-abu pada teks bio.

---

## 🎨 Custom CSS
Selain Bootstrap, proyek ini menggunakan sedikit **CSS tambahan**:
```css
body {
  background-color: #000; /* Latar belakang hitam */
  color: #fff; /* Teks putih */
  font-family: Arial, sans-serif;
}

.profile-img {
  width: 120px;
  height: 120px;
  object-fit: cover;
}

.post-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
}
```


## 📱 Responsivitas
- **Mobile** → Grid foto tampil 1 kolom.  
- **Tablet** → Grid foto tampil 2 kolom.  
- **Desktop** → Grid foto tampil 3 kolom.  
- Profil otomatis menyesuaikan tata letak (foto di atas di mobile, sejajar di desktop).  

---

## 📌 Cara Menjalankan
1. Download atau clone repository ini.  
2. Simpan gambar profil (`profil.jpg`) dan foto postingan (`1.jpg`, `2.jpg`, dst) di folder yang sama dengan file HTML.  
3. Buka file `index.html` menggunakan browser.  

---

## 🎯 Kesimpulan
Dengan menggabungkan **Bootstrap Grid**, **Flexbox Utilities**, serta **Custom CSS**, proyek ini berhasil menampilkan halaman profil Instagram yang responsif dan mirip dengan aslinya tanpa banyak kode CSS manual.
