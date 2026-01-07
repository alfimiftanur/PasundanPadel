# 🎾 Pasundan Padel

Pasundan Padel adalah platform pemesanan lapangan padel berbasis web yang dibuat menggunakan Laravel dan Blade. Website ini mempermudah pengguna dalam melihat jadwal lapangan, melakukan booking, dan mengelola reservasi, serta menyediakan dashboard admin untuk pengelolaan data, gambar, dan laporan booking dalam bentuk PDF.

Proyek ini dikembangkan sebagai tugas besar pengembangan web dengan fokus pada implementasi CRUD, relasi database, autentikasi, manajemen gambar, integrasi payment gateway, serta pembuatan laporan.

## 📖 Asal Usul Projek

Padel adalah olahraga yang mulai populer di berbagai kota besar di Indonesia, termasuk wilayah Bandung. Melihat meningkatnya minat masyarakat namun minimnya sistem pemesanan digital yang terstruktur, lahirlah Pasundan Padel, sistem booking lapangan padel yang sederhana, modern, dan mudah digunakan.

Nama "Pasundan Padel" dipilih sebagai representasi identitas lokal Sunda dan semangat membangun layanan olahraga yang profesional di wilayah tersebut.

## ✨ Fitur Utama

### 🔵 Frontend (User)
- Landing page informatif dan responsive
- Daftar lapangan dengan detail fasilitas lengkap
- Pencarian & filtering jadwal tersedia
- Form booking yang intuitif
- Integrasi pembayaran online dengan Midtrans
- Riwayat pemesanan
- Pembatalan booking

### 🔴 Backend (Admin)
- Dashboard Admin untuk mengelola:
    - Data lapangan (courts) - CRUD lengkap
    - Jadwal (schedules) - CRUD lengkap
    - Manajemen booking dan status pembayaran
    - Upload & delete gambar lapangan
- Validasi form
- Live search & filtering data
- Generate PDF laporan booking
- Sistem otomatis pembatalan booking expired

### 🟢 Authentication & Authorization
- Sistem registrasi pengguna
- Login & logout
- Role-based access (Admin & User)
- Middleware untuk proteksi route

### 🟡 Database Relations
- User (1 → many) Pemesanan
- Lapangan (1 → many) Jadwal
- Jadwal (1 → many) Pemesanan
- Relasi foreign key dengan constraint

### 💳 Payment Integration
- Integrasi Midtrans Payment Gateway
- Multiple payment methods (Credit Card, E-Wallet, Bank Transfer, dll)
- Callback handling untuk update status pembayaran
- Sandbox mode untuk testing

### 🌤️ Public API Integration
- **OpenWeatherMap API** untuk menampilkan data cuaca real-time
- Menampilkan informasi cuaca di halaman detail lapangan
- Data yang ditampilkan: temperature, humidity, wind speed, weather description
- Membantu user memutuskan waktu booking berdasarkan kondisi cuaca

## 🏗️ Tech Stack

### Backend
- **Framework:** Laravel 12
- **PHP:** 8.4
- **Database:** MySQL / MariaDB
- **PDF Generator:** DOMPDF (barryvdh/laravel-dompdf)
- **Payment Gateway:** Midtrans PHP SDK
- **Public API:** OpenWeatherMap API

### Frontend
- **Template Engine:** Blade
- **CSS Framework:** TailwindCSS
- **Build Tool:** Vite
- **JavaScript:** Vanilla JS

### Development Tools
- **Testing:** Pest PHP
- **Code Style:** Laravel Pint
- **Package Manager:** Composer, NPM

## 🚀 Cara Instalasi di Local Machine

Ikuti langkah-langkah berikut untuk menjalankan Pasundan Padel di komputer lokal.

### 1️⃣ Clone Repository
```bash
git clone https://github.com/username/pasundan-padel.git
cd pasundan-padel
```

### 2️⃣ Install Dependencies
```bash
composer install

npm install
```

### 3️⃣ Setup Environment
```bash
cp .env.example .env

php artisan key:generate
```

### 4️⃣ Konfigurasi Database

Buat database baru di MySQL/MariaDB:
```sql
CREATE DATABASE pasundan_padel;
```

Update konfigurasi di file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pasundan_padel
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Konfigurasi Midtrans (Payment Gateway)

Daftar akun di [Midtrans](https://midtrans.com/) dan dapatkan Server Key & Client Key dari dashboard.

Tambahkan di file `.env`:
```env
MIDTRANS_SERVER_KEY=your_server_key_here
MIDTRANS_CLIENT_KEY=your_client_key_here
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_IS_SANITIZED=true
MIDTRANS_IS_3DS=true
```

### 6️⃣ Konfigurasi OpenWeatherMap API (Weather Data)

1. Daftar akun gratis di [OpenWeatherMap](https://openweathermap.org/api)
2. Dapatkan API Key dari dashboard
3. Tambahkan di file `.env`:

```env
OPENWEATHER_API_KEY=your_openweather_api_key_here
```

### 7️⃣ Migrasi Database & Seeder
```bash
php artisan migrate

php artisan migrate --seed
```

### 8️⃣ Storage Link
```bash
php artisan storage:link
```

### 9️⃣ Build Assets
```bash
npm run dev

npm run build
```

### 🔟 Jalankan Server
```bash
php artisan serve
```

Aplikasi dapat diakses di:
- **URL:** http://127.0.0.1:8000 atau http://localhost:8000

### 1️⃣1️⃣ Setup Scheduled Tasks (Opsional)

Untuk menjalankan auto-cancel booking yang expired:
```bash
php artisan schedule:work
```
## 🔐 Akun Default

Setelah menjalankan seeder, gunakan akun berikut untuk login:

### Admin
```
Email: admin@pasundanpadel.com
Password: admin123
```

### User
```
Email: test@example.com
Password: password
```

## 📚 Struktur Database

### Tabel Utama:
- **users** - Data pengguna (admin & customer)
- **lapangans** - Data lapangan padel
- **jadwals** - Jadwal ketersediaan lapangan
- **pemesanans** - Data booking/pemesanan
- **cache, jobs** - System tables

### Entity Relationship:
```
users (1) ──→ (N) pemesanans
lapangans (1) ──→ (N) jadwals
jadwals (1) ──→ (N) pemesanans
```

## 👨‍💻 Tim Pengembang

| Role | Nama | 
| :--- | :--- |
| Project Manager | Alfi Mifta Nurhakim |
| Frontend Developer | Trimeldawani |
| Frontend Developer | Rd. Fillery Riantanu Busthomi |
| Backend Developer | Muhamad Rizky |
| Backend Developer | Asep Saepul Milah |
