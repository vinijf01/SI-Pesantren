# 🌙 SI Website Pesantren

Sistem Informasi Website Pesantren adalah platform digital untuk mengelola informasi kegiatan pesantren, PPDB, galeri, berita, serta progress santri. Dibuat menggunakan Laravel sebagai backend framework.

## 📌 Fitur Utama

### Halaman Publik

-   Beranda
-   Visi & Misi
-   PPDB (Penerimaan Peserta Didik Baru)
-   Program Akademik
-   Detail Berita & Pencarian Berita
-   Galeri & Fasilitas
-   Kontak & Tentang Yayasan
    ![image](https://github.com/user-attachments/assets/1472ac4b-fde9-4219-aac6-2dfd4df303cf)

### Formulir

-   Formulir Pra-Pendaftaran
-   Formulir Pendaftaran

### Halaman Admin

-   Dashboard Admin
-   Manajemen Hero Beranda & Hero PPDB
-   Tentang Pesantren (termasuk edit khusus)
-   Fasilitas & Galeri
-   Program Akademik & Ketua Program
-   Jadwal Harian & Keterangan Kelas
-   FAQ, Testimoni, dan Berita
-   Laporan Tahunan Santri (Wustho, Ulya, Takhosus, Idad)
-   Manajemen PPDB (syarat, bank, biaya, cara, peminat, calon santri)
-   Manajemen Santri, Raport, Hafalan, dan Akun Orang Tua

### Halaman Orangtua

-   Login & Logout
-   Dashboard Orangtua
-   Melihat Progress Santri

## ⚙️ Teknologi

-   Laravel (PHP)
-   Blade Templating
-   MySQL
-   Laravel Authentication

## 🛠️ Instalasi Lokal

1. Clone repositori ini
    ```bash
    git clone https://github.com/vinijf01/SI-Pesantren.git
    cd Si-Pesantren
    ```
2. Install dependensi
    ```bash
    composer install
    ```
3. Salin file `.env.example` menjadi `.env`
    ```bash
    cp .env.example .env
    ```
4. Generate key aplikasi
    ```bash
    php artisan key:generate
    ```
5. Buat database di MySQL dan sesuaikan pengaturan `.env` dengan kredensial database Anda
6. Jalankan migrasi untuk membuat tabel database
    ```bash
    php artisan migrate
    ```
7. Jalankan aplikasi di lokal
    ```bash
    php artisan serve
    ```

## 🚀 Fitur Pengembangan Mendatang

-   Penambahan fitur-fitur lainnya sesuai dengan kebutuhan pesantren
-   Perbaikan UI/UX untuk pengalaman pengguna yang lebih baik

## 📜 Lisensi

Frontend menggunakan template Kindedo dari ThemeForest yang telah dimodifikasi.  
Lisensi asli dapat ditemukan di: https://themeforest.net/licenses  
Template ini tidak disertakan dalam repository ini karena hak cipta.
