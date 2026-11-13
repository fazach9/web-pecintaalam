# MAPALA Arga Dahana — Starter Project

Starter awal untuk Website Resmi dan Management System MAPALA Arga Dahana, Universitas Muria Kudus.

## Stack
- PHP Native 8.2+
- MySQL 8+
- PDO
- Bootstrap 5.3
- Arsitektur MVC sederhana

## Menjalankan di XAMPP
1. Ekstrak folder `arga-dahana` ke `htdocs`.
2. Jalankan Apache dan MySQL.
3. Buka phpMyAdmin.
4. Import `database/schema.sql`.
5. Sesuaikan `config/config.php` dengan URL lokal.
6. Sesuaikan kredensial database di `config/database.php`.
7. Buka `http://localhost/arga-dahana/public/`.

## Catatan penting
- Ini adalah starter scaffold, bukan aplikasi produksi yang sudah selesai.
- Login handler sengaja belum diaktifkan. Implementasikan validasi CSRF, `password_verify()`, session regeneration, dan pemeriksaan role sebelum membuat akun admin.
- Jangan gunakan kredensial default pada server produksi.
- Matikan debug, gunakan HTTPS, batasi upload, dan letakkan file sensitif di luar web root.
- Untuk deployment yang lebih aman, arahkan document root web server langsung ke folder `public/`.
- Ubah `base_url` dan path asset sesuai konfigurasi hosting.

## Struktur
```text
app/
  Controllers/
  Core/
  Helpers/
config/
database/
public/
  assets/css/
resources/views/
  auth/
  errors/
  public/
```

## Rencana implementasi berikutnya
1. Selesaikan autentikasi dan middleware role/permission.
2. Buat layout dashboard admin dan anggota.
3. Buat CRUD anggota, periode, divisi, jabatan, dan kepengurusan.
4. Tambahkan kegiatan, peserta, dan presensi.
5. Tambahkan inventaris, peminjaman, dan mutasi stok.
6. Tambahkan transaksi keuangan, iuran, surat, rekrutmen, ekspedisi, konten, laporan, dan audit.
7. Uji akses per role, backup, dan deployment.

## Migrasi database
File `database/schema.sql` merupakan baseline schema awal yang dapat diimpor pada database baru. Untuk perubahan berikutnya, gunakan file SQL migrasi bernomor, misalnya:
- `database/migrations/001_create_core_tables.sql`
- `database/migrations/002_add_activity_registration.sql`

Jalankan migrasi secara berurutan dan catat versi yang sudah diterapkan pada tabel `schema_migrations` (tambahkan saat membangun migration runner).
