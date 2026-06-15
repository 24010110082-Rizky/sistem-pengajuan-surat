# Sistem Pengajuan Surat Mahasiswa

## Deskripsi Singkat
Sistem Pengajuan Surat Mahasiswa adalah aplikasi web berbasis CodeIgniter 3 yang memudahkan mahasiswa Universitas Bumigora dalam mengajukan permohonan surat secara online tanpa harus datang langsung ke bagian administrasi. Admin/Staf TU dapat mengelola dan memperbarui status pengajuan surat secara efisien.

## Teknologi yang Digunakan
- PHP dengan framework CodeIgniter 3
- MySQL sebagai database
- Bootstrap 5 untuk tampilan UI
- XAMPP sebagai local server

## Fitur Utama
- Login multi-role (Admin & Mahasiswa)
- Mahasiswa dapat mengajukan permohonan surat secara online
- Mahasiswa dapat memantau status pengajuan surat
- Admin dapat mengelola pengajuan dan memperbarui status
- Admin dapat mengelola jenis surat dan data mahasiswa
- Dashboard admin dengan statistik pengajuan

## Cara Menjalankan Sistem

### 1. Clone Repository
```bash
git clone https://github.com/24010110082-Rizky/sistem-pengajuan-surat.git
cd sistem-pengajuan-surat
```

### 2. Import Database
- Buka phpMyAdmin
- Buat database baru bernama `sistem_pengajuan_surat`
- Import file `database/pengajuan_surat.sql`

### 3. Konfigurasi Database
Edit file `application/config/database.php`:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'sistem_pengajuan_surat',
);
```

### 4. Konfigurasi Base URL
Edit file `application/config/config.php`:
```php
$config['base_url'] = 'http://localhost/sistem-pengajuan-surat/';
```

### 5. Jalankan Aplikasi
Buka browser dan akses: http://localhost/sistem-pengajuan-surat


## Informasi Akun Uji Coba

| Role | Username | Password |
|------|----------|----------|
| Admin | admin | admin123 |
| Mahasiswa | rizky | mahasiswa123 |
| Mahasiswa | ikbal | mahasiswa123 |
| Mahasiswa | dewa | mahasiswa123 |