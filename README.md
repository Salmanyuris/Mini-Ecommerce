# KIMIA UTAMA SARI E-COMMERCE

<h1 align="center">
  Sistem Penjualan Online Berbasis Web (E-Commerce)
</h1>

<p align="center">
  Dibangun menggunakan Laravel, MySQL, Tailwind CSS, dan Vite.
</p>

---

## 📖 Tentang Project

**Kimia Utama Sari E-Commerce** merupakan sistem penjualan online berbasis web yang dikembangkan untuk membantu proses penjualan produk pada **UD. Kimia Utama Sari Kota Semarang**.

Sistem ini dikembangkan sebagai bagian dari penelitian dengan judul:

> **Rancang Bangun Sistem Penjualan Online Berbasis Web (E-Commerce) Menggunakan Metode Waterfall pada UD. Kimia Utama Sari Kota Semarang**

Aplikasi ini memungkinkan konsumen untuk melihat produk, mencari produk, memasukkan produk ke keranjang belanja, melakukan checkout, serta mengunggah bukti pembayaran.

Selain itu, administrator dapat mengelola produk, kategori, pesanan, pengguna, serta melakukan verifikasi pembayaran. Sistem juga menyediakan laporan penjualan untuk membantu pemilik dalam melakukan monitoring terhadap aktivitas penjualan toko.

---

## ✨ Fitur Utama

### 👤 Konsumen

- Registrasi akun
- Login dan logout
- Melihat katalog produk
- Mencari produk
- Melihat detail produk
- Menambahkan produk ke keranjang
- Mengubah jumlah produk dalam keranjang
- Menghapus produk dari keranjang
- Melakukan checkout
- Mengisi informasi pengiriman
- Mengunggah bukti pembayaran
- Melihat riwayat pesanan
- Melihat status pesanan
- Mengonfirmasi penerimaan barang

### 👨‍💼 Administrator

- Dashboard admin
- Manajemen produk
    - Tambah produk
    - Edit produk
    - Hapus produk

- Manajemen kategori
- Manajemen pesanan
- Verifikasi pembayaran
- Pembatalan pesanan
- Update status pesanan
- Input informasi pengiriman dan nomor resi
- Manajemen pengguna
- Monitoring transaksi

### 📊 Pemilik / Owner

- Melihat laporan penjualan
- Monitoring transaksi
- Melihat informasi pesanan
- Melakukan evaluasi aktivitas penjualan

---

## 🛠️ Teknologi yang Digunakan

| Teknologi    | Fungsi                      |
| ------------ | --------------------------  |
| PHP          | Bahasa pemrograman backend  |
| Laravel      | Framework utama aplikasi    |
| MySQL        | Database management system  |
| Blade        | Template engine             |
| Tailwind CSS | Styling antarmuka           |
| Vite         | Build tool frontend         |
| Composer     | Dependency manager PHP      |
| NPM          | Package manager JavaScript  |

---

## 📋 Kebutuhan Sistem

Pastikan perangkat telah memiliki:

- PHP 8.2 atau versi yang sesuai dengan Laravel
- Composer
- MySQL atau MariaDB
- Node.js
- NPM
- Git

---

## ⚙️ Instalasi Project

### 1. Clone Repository

```bash
git clone <repository-url>
```

Masuk ke folder project:

```bash
cd kimia-utama-sari
```

---

### 2. Install Dependency PHP

```bash
composer install
```

---

### 3. Salin File Environment

```bash
cp .env.example .env
```

Untuk Windows:

```bash
copy .env.example .env
```

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

### 5. Konfigurasi Database

Buat database MySQL dengan nama:

```text
kimia_utama_sari
```

Kemudian sesuaikan konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kimia_utama_sari
DB_USERNAME=root
DB_PASSWORD=
```

---

### 6. Jalankan Migration

```bash
php artisan migrate
```

Apabila tersedia database seeder:

```bash
php artisan migrate --seed
```

---

### 7. Buat Storage Link

Untuk menampilkan gambar produk dan bukti pembayaran:

```bash
php artisan storage:link
```

---

### 8. Install Dependency Frontend

```bash
npm install
```

---

### 9. Jalankan Vite

Untuk development:

```bash
npm run dev
```

Untuk production:

```bash
npm run build
```

---

### 10. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

---

## 👥 Role Pengguna

Sistem memiliki beberapa role pengguna sebagai berikut:

| Role     | Hak Akses                                         |
| -------- | ------------------------------------------------- |
| Konsumen | Melakukan pembelian dan mengelola pesanan pribadi |
| Admin    | Mengelola produk, kategori, pesanan, dan pengguna |
| Owner    | Melihat laporan dan monitoring penjualan          |

---

## 🛒 Alur Pembelian

Proses pembelian pada sistem dilakukan melalui tahapan berikut:

```text
Pilih Produk
      ↓
Lihat Detail Produk
      ↓
Tambah ke Keranjang
      ↓
Kelola Keranjang
      ↓
Checkout
      ↓
Isi Data Pengiriman
      ↓
Upload Bukti Pembayaran
      ↓
Pesanan Dibuat
(Status: Pending)
      ↓
Verifikasi Admin
      ↓
Pesanan Diproses
      ↓
Pengiriman Barang
      ↓
Pesanan Diterima
(Status: Completed)
```

---

## 📦 Status Pesanan

| Status    | Keterangan                                              |
| --------- | ------------------------------------------------------- |
| Pending   | Pesanan telah dibuat dan menunggu verifikasi pembayaran |
| Paid      | Pembayaran telah diverifikasi                           |
| Shipped   | Pesanan telah dikirim                                   |
| Completed | Pesanan telah diterima oleh konsumen                    |
| Cancelled | Pesanan dibatalkan                                      |

---

## 🗂️ Struktur Project

```text
kimia-utama-sari/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   │
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       ├── Category.php
│       ├── Cart.php
│       ├── Order.php
│       └── OrderItem.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   └── web.php
│
├── storage/
│
└── README.md
```

---

## 🧪 Pengujian Sistem

Pengujian sistem dilakukan menggunakan metode **User Acceptance Testing (UAT)**.

Pengujian dilakukan terhadap beberapa modul utama, antara lain:

| No  | Modul                      |
| --- | -------------------------- |
| 1   | Autentikasi                |
| 2   | Katalog Produk             |
| 3   | Pencarian Produk           |
| 4   | Keranjang Belanja          |
| 5   | Checkout                   |
| 6   | Pembayaran                 |
| 7   | Riwayat Pesanan            |
| 8   | Manajemen Produk           |
| 9   | Manajemen Kategori         |
| 10  | Manajemen Pesanan          |
| 11  | Manajemen Pengguna         |
| 12  | Keamanan dan Kontrol Akses |

Berdasarkan hasil pengujian yang dilakukan, terdapat **37 test case** dan seluruh skenario pengujian berhasil dijalankan sesuai dengan kebutuhan sistem.

---

## 🔒 Keamanan

Sistem menerapkan beberapa mekanisme keamanan, antara lain:

- Autentikasi pengguna
- Pembatasan akses berdasarkan role
- Middleware autentikasi
- Middleware administrator
- Validasi input
- Validasi upload file
- Proteksi halaman administrator
- Manajemen session Laravel

---

## 🚀 Deployment

Untuk deployment pada server production, beberapa perintah berikut dapat digunakan:

```bash
composer install --optimize-autoloader --no-dev
```

```bash
npm install
npm run build
```

```bash
php artisan migrate --force
```

```bash
php artisan storage:link
```

```bash
php artisan optimize
```

Pastikan konfigurasi `.env` pada server production telah disesuaikan.

Contoh:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
```

---

## 🔧 Maintenance

Pemeliharaan sistem dilakukan secara berkala untuk menjaga stabilitas dan keamanan aplikasi.

Beberapa aktivitas maintenance meliputi:

- Backup database secara berkala
- Backup file produk dan bukti pembayaran
- Pemantauan log error
- Pembaruan dependency
- Perbaikan bug
- Optimasi performa sistem
- Penambahan fitur sesuai kebutuhan bisnis

Log Laravel dapat ditemukan pada:

```text
storage/logs/laravel.log
```

---

## 📄 Lisensi

Project ini dikembangkan untuk keperluan akademik dan penelitian.

---

## 👨‍💻 Developer

**Salman Yuris Adila Azzami**

Sistem Informasi
Universitas Dian Nuswantoro

---

<p align="center">
  Dibuat menggunakan ❤️ dengan Laravel
</p>
