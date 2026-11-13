# 🏔️ Web Portal Mapala Arga Dahana UMK

![Status](https://shields.io)
![PHP](https://shields.io)
![MySQL](https://shields.io)

Aplikasi web berbasis arsitektur **PHP MVC (Model-View-Controller)** dan **MySQL** untuk sistem informasi, publikasi kegiatan, dan portal anggota organisasi **Mapala Arga Dahana Universitas Muria Kudus**.

> ⚠️ **Catatan:** Proyek ini masih dalam tahap pengembangan aktif (*Work in Progress*). Beberapa fitur dan tampilan masih terus disempurnakan.

## 🚧 Status & Roadmap Pengembangan
- [x] **Inisialisasi Arsitektur MVC:** Struktur dasar `Router`, `Database`, `Controllers`, dan `Views`.
- [x] **Konfigurasi Keamanan Dasar:** Pembuatan *security helper* dan struktur autentikasi login.
- [x] **Skema Database Awal:** Perancangan tabel dasar pada `database/schema.sql`.
- [x] **Halaman Publik & Error Dasar:** Tampilan beranda (`home.php`), halaman login (`login.php`), dan halaman `404.php`.
- [ ] **Dashboard Admin & Manajemen Konten:** Pengelolaan berita, artikel ekspedisi, dan dokumentasi kegiatan *(Dalam proses)*.
- [ ] **Manajemen Data Anggota & Inventaris Alat:** Pendataan keanggotaan dan logistik perlengkapan organisasi *(Rencana berikutnya)*.
- [ ] **Penyempurnaan UI/UX Responsif:** Optimalisasi tampilan pada perangkat mobile dan desktop *(Rencana berikutnya)*.

## 🗂️ Struktur Direktori Saat Ini
```text
arga_dahana_starter/
├── app/
│   ├── Controllers/
│   │   ├── AuthController.php    # Logika autentikasi & login
│   │   └── HomeController.php    # Logika halaman utama publik
│   ├── Core/
│   │   ├── Database.php          # Kelas pengelola koneksi database
│   │   └── Router.php            # Pengatur rute URL aplikasi
│   └── Helpers/
│       └── security.php          # Fungsi pembantu keamanan aplikasi
├── config/
│   ├── config.php                # Pengaturan umum aplikasi
│   └── database.php              # Konfigurasi kredensial database
├── database/
│   └── schema.sql                # Skema struktur database MySQL
├── public/
│   ├── assets/
│   │   ├── css/app.css           # Stylesheet utama
│   │   └── img/logo.png          # Logo organisasi Mapala Arga Dahana
│   └── index.php                 # Entry point utama aplikasi
├── resources/
│   └── views/
│       ├── auth/login.php        # Tampilan halaman login
│       ├── errors/404.php        # Tampilan halaman 404 Not Found
│       └── public/home.php       # Tampilan halaman beranda publik
└── README.md                     # Dokumentasi proyek
```

## 🚀 Cara Menjalankan Versi Pengembangan (Localhost)
1. **Clone Repository**
   ```bash
   git clone https://github.com
   ```
2. **Import Database**
   - Buka **phpMyAdmin** (`http://localhost/phpmyadmin`).
   - Buat database baru sesuai pengaturan di `config/database.php`.
   - Import file `database/schema.sql`.
3. **Konfigurasi Lingkungan Lokal**
   Sesuaikan pengaturan koneksi database pada `config/database.php` dan konfigurasi dasar pada `config/config.php`.
4. **Jalankan di Browser**
   Akses proyek melalui server lokal Anda di `http://localhost/arga_dahana_starter/public`.

## 👨‍💻 Pengembang
**Faza Chansa Maulana, S.Kom**
- **Latar Belakang:** S1 Teknik Informatika – Universitas Muria Kudus
- **Organisasi:** Mapala Arga Dahana UMK
- **Email:** [fazachansa123@gmail.com](mailto:fazachansa123@gmail.com)
