<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawaiData = [
            ['nip' => '100001', 'devisi_id' => 1, 'nama' => 'Budi Santoso', 'alamat' => 'Jl. Merdeka No. 1, Jakarta', 'status' => 'belum menikah', 'gender' => 'pria', 'telepon' => '08123456781', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => Carbon::now()->subYears(25)->toDateString()],
            ['nip' => '100002', 'devisi_id' => 2, 'nama' => 'Siti Aminah', 'alamat' => 'Jl. Sudirman No. 45, Bandung', 'status' => 'menikah', 'gender' => 'wanita', 'telepon' => '08123456782', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => Carbon::now()->subYears(28)->toDateString()],
            ['nip' => '100003', 'devisi_id' => 3, 'nama' => 'Ahmad Fauzi', 'alamat' => 'Jl. Gajah Mada No. 10, Surabaya', 'status' => 'menikah', 'gender' => 'pria', 'telepon' => '08123456783', 'tempat_lahir' => 'Surabaya', 'tanggal_lahir' => Carbon::now()->subYears(30)->toDateString()],
            ['nip' => '100004', 'devisi_id' => 4, 'nama' => 'Dewi Lestari', 'alamat' => 'Jl. Diponegoro No. 78, Yogyakarta', 'status' => 'belum menikah', 'gender' => 'wanita', 'telepon' => '08123456784', 'tempat_lahir' => 'Yogyakarta', 'tanggal_lahir' => Carbon::now()->subYears(26)->toDateString()],
            ['nip' => '100005', 'devisi_id' => 5, 'nama' => 'Rahmat Hidayat', 'alamat' => 'Jl. Veteran No. 22, Medan', 'status' => 'belum menikah', 'gender' => 'pria', 'telepon' => '08123456785', 'tempat_lahir' => 'Medan', 'tanggal_lahir' => Carbon::now()->subYears(27)->toDateString()],
            ['nip' => '100006', 'devisi_id' => 6, 'nama' => 'Nur Aisyah', 'alamat' => 'Jl. Kartini No. 13, Makassar', 'status' => 'menikah', 'gender' => 'wanita', 'telepon' => '08123456786', 'tempat_lahir' => 'Makassar', 'tanggal_lahir' => Carbon::now()->subYears(29)->toDateString()],
            ['nip' => '100007', 'devisi_id' => 7, 'nama' => 'Hendra Wijaya', 'alamat' => 'Jl. Imam Bonjol No. 9, Semarang', 'status' => 'menikah', 'gender' => 'pria', 'telepon' => '08123456787', 'tempat_lahir' => 'Semarang', 'tanggal_lahir' => Carbon::now()->subYears(31)->toDateString()],
            ['nip' => '100008', 'devisi_id' => 8, 'nama' => 'Sri Wahyuni', 'alamat' => 'Jl. Soekarno-Hatta No. 25, Malang', 'status' => 'belum menikah', 'gender' => 'wanita', 'telepon' => '08123456788', 'tempat_lahir' => 'Malang', 'tanggal_lahir' => Carbon::now()->subYears(24)->toDateString()],
            ['nip' => '100009', 'devisi_id' => 9, 'nama' => 'Agus Setiawan', 'alamat' => 'Jl. Panglima Polim No. 11, Denpasar', 'status' => 'belum menikah', 'gender' => 'pria', 'telepon' => '08123456789', 'tempat_lahir' => 'Denpasar', 'tanggal_lahir' => Carbon::now()->subYears(23)->toDateString()],
            ['nip' => '100010', 'devisi_id' => 10, 'nama' => 'Lestari Ayu', 'alamat' => 'Jl. Jendral Sudirman No. 99, Balikpapan', 'status' => 'belum menikah', 'gender' => 'wanita', 'telepon' => '08123456790', 'tempat_lahir' => 'Balikpapan', 'tanggal_lahir' => Carbon::now()->subYears(27)->toDateString()],
        ];

        DB::table('pegawai')->insert($pegawaiData);
    }
}
