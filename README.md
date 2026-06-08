# Website Ikatan Putera Puteri Batik Jawa Timur

Website resmi Ikatan Putera Puteri Batik Jawa Timur yang menampilkan sejarah, filosofi, katalog produk batik, dan dokumentasi event dari berbagai sentra batik di Jawa Timur.

## Tema & Desain

Website menggunakan tema batik dengan palet warna:
- **Primary**: `#8B0022` (Merah Batik)
- **Secondary**: `#C92C53` (Pink Batik)
- **Accent**: `#F25C79`
- **Light**: `#FDE9ED`
- **Dark**: `#1A1A1A`

## Fitur Website

### Frontend (Website Publik)
- **Beranda**: Banner dengan informasi utama asosiasi
- **Sejarah Batik**: Perjalanan panjang batik sebagai warisan budaya
- **Filosofi Batik**: Makna mendalam di balik motif batik
- **Katalog Batik**: Koleksi produk dari berbagai sentra batik
- **Event**: Dokumentasi event dan workshop batik
- **Kontak**: Informasi kontak dan lokasi

### Backend (Dashboard Admin)
- **Manajemen Produk**: Katalog batik dengan kategori
- **Manajemen Event**: Event dan workshop batik
- **Manajemen Testimoni**: Testimoni pengunjung
- **Manajemen Konten**: Blok konten dinamis
- **Manajemen Subscriber**: Newsletter subscribers
- **Pengaturan Website**: Konfigurasi umum website

## Teknologi

### Frontend
- HTML5, CSS3, JavaScript
- Bootstrap 5
- Swiper.js untuk carousel
- Font Awesome untuk ikon
- Google Fonts (Jost & Marcellus)

### Backend
- **Laravel 11**: Framework PHP
- **Filament 3**: Admin panel
- **MySQL**: Database
- **Composer**: Dependency management

## Instalasi & Setup

### Persyaratan Sistem
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & npm
- MySQL 8.0 atau MariaDB
- Git

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd batik-jatim-website
   ```

2. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install

   # Install Node.js dependencies (jika ada)
   npm install
   ```

3. **Konfigurasi Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi Database**
   Edit file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=batik_jatim
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Migrate & Seed Database**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Buat Storage Link**
   ```bash
   php artisan storage:link
   ```

7. **Jalankan Aplikasi**
   ```bash
   # Jalankan Laravel server
   php artisan serve --host=0.0.0.0 --port=8000

   # Jalankan dashboard admin (terminal terpisah)
   php artisan serve --host=0.0.0.0 --port=8001
   ```

## Akses Admin Panel

### Login Admin
- **URL**: `http://localhost:8001/admin`
- **Email**: `admin@batikjatim.org`
- **Password**: `password`

### Fitur Admin Panel
1. **Dashboard**: Ringkasan statistik website
2. **Kategori Produk**: Manajemen kategori batik
3. **Produk**: Manajemen katalog batik
4. **Event**: Manajemen event dan workshop
5. **Testimoni**: Manajemen testimoni pengunjung
6. **Konten Website**: Blok konten dinamis
7. **Subscriber**: Manajemen newsletter
8. **Pengaturan**: Konfigurasi website

## Struktur Direktori

```
batik-jatim-website/
├── app/                          # Aplikasi Laravel
│   ├── Filament/                 # Admin panel resources
│   ├── Models/                   # Eloquent models
│   └── Providers/                # Service providers
├── database/                     # Database migrations & seeders
├── public/                       # Assets publik
│   ├── css/                      # Stylesheets
│   ├── js/                       # JavaScript files
│   ├── images/                   # Gambar website
│   └── favicon.ico              # Favicon
├── resources/                    # Resources Laravel
├── routes/                       # Route definitions
├── storage/                      # File storage
├── index.html                    # Halaman utama website
├── style.css                     # Custom styles
├── README.md                     # Dokumentasi ini
└── composer.json                 # Dependencies PHP
```

## Penggunaan

### Untuk Pengunjung Website
1. Buka `http://localhost:8000` di browser
2. Jelajahi berbagai halaman:
   - Beranda
   - Sejarah Batik
   - Filosofi Batik
   - Katalog Batik
   - Event
   - Kontak

### Untuk Admin Website
1. Buka `http://localhost:8001/admin`
2. Login dengan kredensial admin
3. Kelola konten website melalui dashboard

## Konfigurasi Tambahan

### File Upload
Website mendukung upload gambar untuk:
- Produk batik
- Event documentation
- Testimoni
- Konten website

### Email Configuration
Untuk mengaktifkan newsletter, konfigurasikan SMTP di `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email@domain.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@domain.com
MAIL_FROM_NAME="Ikatan Putera Puteri Batik Jawa Timur"
```

## 📊 Database Schema

### Tabel Utama
- `users`: User admin
- `product_categories`: Kategori produk batik
- `products`: Produk batik
- `events`: Event dan workshop
- `testimonials`: Testimoni pengunjung
- `content_blocks`: Blok konten dinamis
- `newsletter_subscribers`: Subscriber newsletter
- `settings`: Pengaturan website

## Deployment

### Production Deployment
1. Upload semua file ke server
2. Konfigurasi web server (Apache/Nginx)
3. Setup SSL certificate
4. Konfigurasi environment variables
5. Jalankan `php artisan migrate --seed`
6. Setup cron job untuk maintenance

### Environment Variables Production
```env
APP_NAME="Ikatan Putera Puteri Batik Jawa Timur"
APP_ENV=production
APP_KEY=your-app-key
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

## Kontribusi

1. Fork repository
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## Lisensi

Distributed under the MIT License. See `LICENSE` for more information.

## Kontak

**Ikatan Putera Puteri Batik Jawa Timur**
- Website: [https://batikjatim.org](https://batikjatim.org)
- Email: info@batikjatim.org
- Telepon: +62 31 1234 5678
- Alamat: Jl. Raya Batik No. 123, Surabaya, Jawa Timur

---

**Dibuat dengan untuk melestarikan budaya batik Indonesia**
