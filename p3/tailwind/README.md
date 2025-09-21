# 📸 Instagram Profile Clone (TailwindCSS)

Proyek ini adalah sebuah halaman web statis yang mereplikasi tampilan **profil Instagram** menggunakan **HTML** dan **Tailwind CSS**.  
Fokus utama dari proyek ini adalah **membuat layout responsif** dengan memanfaatkan **utility classes Tailwind** tanpa menulis CSS manual.

---

## 🚀 Teknologi yang Digunakan
- **HTML5** → Struktur dasar halaman.  
- **Tailwind CSS (CDN)** → Framework CSS utility-first yang ringan dan fleksibel.  
- **Responsive Utilities** dari Tailwind → Mengatur layout agar adaptif di berbagai perangkat.  

---

## ✨ Fitur Utama
- Foto profil berbentuk **lingkaran** dengan `rounded-full` dan `object-cover`.  
- Informasi profil (username, bio, posts, followers, following).  
- Tombol interaktif **Edit Profile** dan **View Archive**.  
- Galeri foto dengan **grid responsif** (1 kolom di mobile, 2 di tablet, 3 di desktop).  
- **Desain dark mode** otomatis dengan background hitam (`bg-black`) dan teks putih (`text-white`).  

---

## 📂 Struktur Halaman
1. **Profile Section**  
   Menampilkan foto profil, nama pengguna, tombol aksi, informasi statistik, dan bio.  

2. **Posts Grid**  
   Menampilkan koleksi foto dengan grid system bawaan Tailwind:
   - `grid-cols-1` untuk mobile,  
   - `sm:grid-cols-2` untuk tablet,  
   - `md:grid-cols-3` untuk desktop.  

---

## 🔑 Kunci Tailwind yang Digunakan
- **Layout & Flexbox**
  - `flex flex-col md:flex-row` → Mengatur posisi profil (vertikal di mobile, horizontal di desktop).  
  - `items-center` → Menyelaraskan elemen di tengah.  

- **Grid System**
  - `grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3` → Membuat galeri responsif.  

- **Komponen Utility**
  - Foto Profil → `w-24 h-24 md:w-32 md:h-32 rounded-full object-cover`.  
  - Tombol → `border border-white text-white text-sm px-3 py-1 rounded`.  
  - Post Image → `w-full h-72 object-cover`.  

- **Tipografi & Warna**
  - `text-2xl font-bold` → Nama profil tebal & besar.  
  - `text-gray-400 text-sm` → Bio berwarna abu-abu.  
  - `font-medium` → Menonjolkan angka (post, followers, following).  

---

## 📱 Responsivitas
- **Mobile** → Grid foto tampil 1 kolom.  
- **Tablet** → Grid foto tampil 2 kolom.  
- **Desktop** → Grid foto tampil 3 kolom.  
- **Profil** → Foto profil di atas pada mobile, sejajar di desktop.  

---

## 📌 Cara Menjalankan
1. Download atau clone repository ini.  
2. Simpan gambar profil (`profil.jpg`) dan foto postingan (`1.jpg`, `2.jpg`, dst) di folder yang sama dengan file HTML.  
3. Buka file `index.html` menggunakan browser.  

---


## 🎯 Kesimpulan
Dengan menggabungkan **Flexbox**, **Grid System**, dan **utility classes** dari Tailwind, proyek ini berhasil menampilkan halaman profil Instagram yang **sederhana, modern, dan responsif**, tanpa perlu menulis CSS manual tambahan.  

---



