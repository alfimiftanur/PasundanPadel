# Pasundan Padel

Pasundan Padel adalah platform pemesanan lapangan padel berbasis web yang dibuat menggunakan Laravel dan Blade. Website ini mempermudah pengguna dalam melihat jadwal lapangan, melakukan booking, dan mengelola reservasi, serta menyediakan dashboard admin untuk pengelolaan data, gambar, dan laporan booking dalam bentuk PDF.

Proyek ini dikembangkan sebagai tugas besar pengembangan web dengan fokus pada implementasi CRUD, relasi database, autentikasi, manajemen gambar, integrasi API, serta pembuatan laporan.

# 📖 Asal Usul Projek

Padel adalah olahraga yang mulai populer di berbagai kota besar di Indonesia, termasuk wilayah Bandung. Melihat meningkatnya minat masyarakat namun minimnya sistem pemesanan digital yang terstruktur, lahirlah Pasundan Padel, sistem booking lapangan padel yang sederhana, modern, dan mudah digunakan.

Nama "Pasundan Padel" dipilih sebagai representasi identitas lokal Sunda dan semangat membangun layanan olahraga yang profesional di wilayah tersebut.

# ✨ Fitur Utama
## 🔵 Frontend
- Landing page informatif dan responsive
- List lapangan + detail fasilitas
- Pencarian & filtering jadwal
- Form booking
- Integrasi API Publik

## 🔴 Backend
- Dashboard Admin untuk mengelola:
    - Data lapangan (courts)
    - Jadwal (schedules)
    - Booking
    - Upload & delete gambar
- CRUD lengkap
- Validasi form
- Live search & filtering data
- Generate PDF laporan booking bulanan
## 🟢 Authentication
- Login
- Register
- Logout
## 🟡 Database 
- User (1 → many) Bookings
- Court (1 → many) Schedules
- Schedule (1 → many) Bookings
 ## 🧩 API Publik
 - ### soon
# 🏗️ Tech Stack
## Backend
- Laravel 10
- PHP 8.x
- MySQL / MariaDB
## Frontend
- Blade Templates
- TailwindCSS
- Other Tools
- DOMPDF / Laravel Snappy (PDF)
- API
- Laravel File Storage

# Cara Instalasi di Local Machine
## Ikuti langkah-langkah berikut untuk menjalankan Pasundan Padel di komputer lokal.

## 1️⃣ Clone Repository
```
git clone https://github.com/username/pasundan-padel.git
```

## 2️⃣ Install Dependencies Laravel
```
composer install
npm install
npm run dev
```

## 3️⃣ Copy .env File
```
cp .env.example .env
```

## 4️⃣ Generate Application Key
```
php artisan key:generate
```

## 5️⃣ Setup Database

Buat database baru, misalnya: pasundan_padel

Update .env:
```
DB_DATABASE=pasundan_padel
DB_USERNAME=root
DB_PASSWORD= 
```
## 6️⃣ Running Migration & Seeder
```
 php artisan migrate --seed 
```

## 7️⃣ Run Local Server
```
php artisan serve
```
Akses aplikasi:
```
http://127.0.0.1:8000
```
atau
```
http://localhost:8000
```

## 🔐 Akun Default (Seeder)
Admin:
```
email: soon
password: soon
```
User:
```
email: soon
password: soon
```

## 📄 Generate PDF Laporan
Admin dapat mengunduh laporan booking dalam bentuk PDF:
```
/admin/bookings/report
```

## 🌤️ Integrasi API Publik

Gunakan API (soon)

Tambahkan API key di .env:
```
API_KEY=your_api_key
```

## 👨‍💻 Kontributor
| Role | Member | 
| :--- | :--- |
|Project Manager | Alfi Mifta Nurhakim |
|Frontend Developer	|Trimeldawani|
|Frontend Developer	|Rd. Fillery Riantanu Busthomi|
|Backend Developer	|Muhamad Rizky|
|Backend Developer	|Asep Saepul Milah|
