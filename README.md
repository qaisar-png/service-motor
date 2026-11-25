# Aplikasi Servis Motor

Aplikasi manajemen servis motor berbasis **Laravel** dan **MySQL**, dengan antarmuka web (Blade + Tailwind CSS) dan **REST API** yang dapat diuji menggunakan **Postman**.

Dibuat sebagai Tugas Project Akhir.

- **Nama**: [isi nama lengkap]
- **NIS/NIM**: [isi]
- **Kelas**: [isi]

## Fitur

| No | Menu | Keterangan |
|----|------|------------|
| 1 | Data Pelanggan | CRUD pelanggan (id, nama lengkap, no HP, alamat, pekerjaan) |
| 2 | Data Kendaraan | CRUD kendaraan (no plat, jenis dengan radio button Matic / Manual Transmisi, no STNK, tahun, nama pemilik, warna) |
| 3 | Daftar Service | Pendaftaran servis. No plat dan id pelanggan berupa dropdown dari tabel terkait, nama pelanggan muncul otomatis |
| 4 | Data Service | Detail pengerjaan. Id servis berupa dropdown, keluhan muncul otomatis, ditambah estimasi, mekanik, dan sparepart |
| 5 | Pembayaran Service | Pembayaran dengan id servis dropdown, jumlah biaya, jenis pembayaran (radio button Cash / Tunai atau Non Tunai), dan keterangan |

## Teknologi

- PHP 8.2 atau lebih baru
- Laravel 11/12
- MySQL / MariaDB
- Composer
- Tailwind CSS (via CDN, butuh koneksi internet)
- Postman (untuk pengujian API)
- Git

## Instalasi (Clone dari Git)

```bash
# 1. Clone repository
git clone https://github.com/USERNAME/servis-motor.git
cd servis-motor

# 2. Install dependensi
composer install

# 3. Salin file environment
cp .env.example .env          # Windows (CMD): copy .env.example .env

# 4. Generate application key
php artisan key:generate
```

Buat database kosong bernama `db_servis_motor` (misalnya lewat phpMyAdmin), lalu sesuaikan `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_servis_motor
DB_USERNAME=root
DB_PASSWORD=
```

Lanjutkan dengan migration dan seeder:

```bash
# 5. Buat tabel
php artisan migrate

# 6. (Opsional) Isi data contoh
php artisan db:seed

# 7. Jalankan server
php artisan serve
```

Aplikasi dapat diakses di `http://127.0.0.1:8000`.

> Untuk mengulang database dari awal beserta data contoh: `php artisan migrate:fresh --seed`
> (perintah ini **menghapus semua data**).

## Struktur Database

| Tabel | Primary Key | Foreign Key |
|-------|-------------|-------------|
| `pelanggan` | `id_pelanggan` (kode diisi manual, mis. P001) | - |
| `kendaraan` | `no_plat` | - |
| `daftar_service` | `id_servis` (kode diisi manual, mis. S001) | `no_plat` ke `kendaraan`, `id_pelanggan` ke `pelanggan` |
| `data_service` | `id` | `id_servis` ke `daftar_service` |
| `pembayaran` | `id` | `id_servis` ke `daftar_service` |

Nama pelanggan dan keluhan tidak disimpan ulang di tabel lain, melainkan diambil lewat relasi Eloquent.

## Rute Web

| Menu | URL |
|------|-----|
| Pelanggan | `/pelanggan` |
| Kendaraan | `/kendaraan` |
| Daftar Service | `/daftar-service` |
| Data Service | `/data-service` |
| Pembayaran | `/pembayaran` |

## Dokumentasi API

Base URL: `http://127.0.0.1:8000/api`

Wajib menyertakan header `Accept: application/json`. Untuk `POST` dan `PUT`, kirim body bertipe **raw JSON**.

| Method | Endpoint | Fungsi |
|--------|----------|--------|
| GET | `/pelanggan` | Daftar semua pelanggan |
| POST | `/pelanggan` | Tambah pelanggan |
| GET | `/pelanggan/{id}` | Detail satu pelanggan |
| PUT | `/pelanggan/{id}` | Ubah pelanggan |
| DELETE | `/pelanggan/{id}` | Hapus pelanggan |

Pola yang sama berlaku untuk resource berikut:

- `/kendaraan` (identifier: no plat, spasi ditulis `%20`, contoh `/kendaraan/BK%201234%20AB`)
- `/daftar-service`
- `/data-service`
- `/pembayaran`

### Contoh Request

**POST `/api/pelanggan`**

```json
{
  "id_pelanggan": "P001",
  "nama_lengkap": "Budi Santoso",
  "no_hp": "081234567890",
  "alamat": "Jl. Gatot Subroto No. 10, Medan",
  "pekerjaan": "Wiraswasta"
}
```

**POST `/api/kendaraan`**

```json
{
  "no_plat": "BK 1234 AB",
  "jenis_kendaraan": "Matic",
  "no_stnk": "STNK-001",
  "tahun_pembuatan": "2020",
  "nama_pemilik": "Budi Santoso",
  "warna": "Hitam"
}
```

**POST `/api/daftar-service`**

```json
{
  "id_servis": "S001",
  "no_plat": "BK 1234 AB",
  "id_pelanggan": "P001",
  "keluhan": "Rem depan blong",
  "tanggal_servis": "2026-11-10"
}
```

**POST `/api/data-service`**

```json
{
  "id_servis": "S001",
  "estimasi_service": "1 hari",
  "nama_mekanik": "Pak Joko",
  "sparepart_pengganti": "Kampas rem depan"
}
```

**POST `/api/pembayaran`**

```json
{
  "id_servis": "S001",
  "jumlah_biaya": 150000,
  "jenis_pembayaran": "Cash / Tunai",
  "keterangan": "Lunas"
}
```

Nilai yang diterima untuk `jenis_kendaraan`: `Matic` atau `Manual Transmisi`. Nilai untuk `jenis_pembayaran`: `Cash / Tunai` atau `Non Tunai`.

### Kode Respons

| Kode | Arti |
|------|------|
| 200 | Berhasil (GET, PUT, DELETE) |
| 201 | Data berhasil dibuat (POST) |
| 404 | Data tidak ditemukan |
| 422 | Validasi gagal |

### Urutan Pengujian

Karena ada relasi antar tabel, buat data sesuai urutan: **pelanggan, kendaraan, daftar-service, data-service, pembayaran**.

## Troubleshooting

| Masalah | Solusi |
|---------|--------|
| `No application encryption key` | Jalankan `php artisan key:generate` |
| `SQLSTATE ... Unknown database` | Buat database `db_servis_motor` terlebih dahulu |
| `Table ... doesn't exist` | Jalankan `php artisan migrate` |
| API mengembalikan halaman HTML | Tambahkan header `Accept: application/json` |
| `Duplicate entry` saat seeding | Jalankan `php artisan migrate:fresh --seed` |

## Lisensi

Proyek ini dibuat untuk keperluan pembelajaran.
