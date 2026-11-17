<?php

namespace Database\Seeders;

use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class ServisMotorSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pelanggan (tabel induk)
        $budi = Pelanggan::create([
            'nama_lengkap' => 'Budi Santoso',
            'no_hp'        => '081234567890',
            'alamat'       => 'Jl. Gatot Subroto No. 10, Medan',
            'pekerjaan'    => 'Wiraswasta',
        ]);
        $siti = Pelanggan::create([
            'nama_lengkap' => 'Siti Aminah',
            'no_hp'        => '082345678901',
            'alamat'       => 'Jl. Sisingamangaraja No. 25, Medan',
            'pekerjaan'    => 'Guru',
        ]);
        $andi = Pelanggan::create([
            'nama_lengkap' => 'Andi Pratama',
            'no_hp'        => '083456789012',
            'alamat'       => 'Jl. Setia Budi No. 7, Medan',
            'pekerjaan'    => 'Mahasiswa',
        ]);

        // 2. Kendaraan (tabel induk)
        Kendaraan::create([
            'no_plat' => 'BK 1234 AB', 'jenis_kendaraan' => 'Matic',
            'no_stnk' => 'STNK-001', 'tahun_pembuatan' => '2020',
            'nama_pemilik' => 'Budi Santoso', 'warna' => 'Hitam',
        ]);
        Kendaraan::create([
            'no_plat' => 'BK 5678 CD', 'jenis_kendaraan' => 'Manual Transmisi',
            'no_stnk' => 'STNK-002', 'tahun_pembuatan' => '2018',
            'nama_pemilik' => 'Siti Aminah', 'warna' => 'Merah',
        ]);
        Kendaraan::create([
            'no_plat' => 'BK 9012 EF', 'jenis_kendaraan' => 'Matic',
            'no_stnk' => 'STNK-003', 'tahun_pembuatan' => '2022',
            'nama_pemilik' => 'Andi Pratama', 'warna' => 'Putih',
        ]);

        // 3. Daftar service (butuh pelanggan + kendaraan)
        $s1 = DaftarService::create([
            'no_plat' => 'BK 1234 AB', 'id_pelanggan' => $budi->id_pelanggan,
            'keluhan' => 'Rem depan blong', 'tanggal_servis' => '2026-11-10',
        ]);
        $s2 = DaftarService::create([
            'no_plat' => 'BK 5678 CD', 'id_pelanggan' => $siti->id_pelanggan,
            'keluhan' => 'Mesin brebet saat digas', 'tanggal_servis' => '2026-11-12',
        ]);
        $s3 = DaftarService::create([
            'no_plat' => 'BK 9012 EF', 'id_pelanggan' => $andi->id_pelanggan,
            'keluhan' => 'Ganti oli dan servis berkala', 'tanggal_servis' => '2026-11-15',
        ]);

        // 4. Data service (butuh daftar service)
        DataService::create([
            'id_servis' => $s1->id_servis, 'estimasi_service' => '1 hari',
            'nama_mekanik' => 'Pak Joko', 'sparepart_pengganti' => 'Kampas rem depan',
        ]);
        DataService::create([
            'id_servis' => $s2->id_servis, 'estimasi_service' => '2 hari',
            'nama_mekanik' => 'Pak Rudi', 'sparepart_pengganti' => 'Busi dan filter bensin',
        ]);
        DataService::create([
            'id_servis' => $s3->id_servis, 'estimasi_service' => '3 jam',
            'nama_mekanik' => 'Pak Joko', 'sparepart_pengganti' => null,
        ]);

        // 5. Pembayaran (butuh daftar service)
        Pembayaran::create([
            'id_servis' => $s1->id_servis, 'jumlah_biaya' => 150000,
            'jenis_pembayaran' => 'Cash / Tunai', 'keterangan' => 'Lunas',
        ]);
        Pembayaran::create([
            'id_servis' => $s2->id_servis, 'jumlah_biaya' => 275000,
            'jenis_pembayaran' => 'Non Tunai', 'keterangan' => 'Transfer bank',
        ]);
        Pembayaran::create([
            'id_servis' => $s3->id_servis, 'jumlah_biaya' => 80000,
            'jenis_pembayaran' => 'Cash / Tunai', 'keterangan' => 'Lunas',
        ]);
    }
}
