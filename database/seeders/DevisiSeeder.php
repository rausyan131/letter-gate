<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devisiData = [
            ['nama_devisi' => 'Akuntansi', 'deskripsi' => 'Mengelola keuangan perusahaan', 'telepon' => '021-1234567'],
            ['nama_devisi' => 'Sumber Daya Manusia', 'deskripsi' => 'Mengurus rekrutmen dan pelatihan', 'telepon' => '021-2345678'],
            ['nama_devisi' => 'Produksi', 'deskripsi' => 'Mengawasi proses produksi', 'telepon' => '021-3456789'],
            ['nama_devisi' => 'Pemasaran', 'deskripsi' => 'Mengembangkan strategi pemasaran', 'telepon' => '021-4567890'],
            ['nama_devisi' => 'Penjualan', 'deskripsi' => 'Menjual produk kepada pelanggan', 'telepon' => '021-5678901'],
            ['nama_devisi' => 'Logistik', 'deskripsi' => 'Mengelola distribusi dan transportasi', 'telepon' => '021-6789012'],
            ['nama_devisi' => 'Pengadaan', 'deskripsi' => 'Mengurus pengadaan barang', 'telepon' => '021-7890123'],
            ['nama_devisi' => 'IT', 'deskripsi' => 'Mengelola sistem dan jaringan IT', 'telepon' => '021-8901234'],
            ['nama_devisi' => 'R&D', 'deskripsi' => 'Mengembangkan produk baru', 'telepon' => '021-9012345'],
            ['nama_devisi' => 'Legal', 'deskripsi' => 'Mengurus urusan hukum perusahaan', 'telepon' => '021-0123456'],
            ['nama_devisi' => 'Operasional', 'deskripsi' => 'Mengatur kegiatan operasional', 'telepon' => '021-1234567'],
            ['nama_devisi' => 'Pemasok', 'deskripsi' => 'Mengelola hubungan dengan pemasok', 'telepon' => '021-2345678'],
            ['nama_devisi' => 'Manajemen Risiko', 'deskripsi' => 'Mengidentifikasi dan mengelola risiko', 'telepon' => '021-3456789'],
            ['nama_devisi' => 'Perencanaan', 'deskripsi' => 'Merencanakan strategi perusahaan', 'telepon' => '021-4567890'],
            ['nama_devisi' => 'Audit', 'deskripsi' => 'Mengawasi dan memeriksa laporan', 'telepon' => '021-5678901'],
        ];

        DB::table('devisi')->insert($devisiData);
    }
}
