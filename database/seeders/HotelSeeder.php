<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::create([
            'nama_hotel' => 'Hotel Grand Wijaya',
            'alamat' => 'Jalan Sudirman No.10',
            'kota' => 'Jakarta',
            'bintang' => 5,
            'deskripsi' => 'Hotel mewah dengan fasilitas lengkap di pusat kota Jakarta',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Puri Indah',
            'alamat' => 'Jalan Kebon Jeruk Raya No.36',
            'kota' => 'Jakarta',
            'bintang' => 4,
            'deskripsi' => 'Hotel modern dengan akses mudah ke berbagai tempat wisata',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Bumi Nusantara',
            'alamat' => 'Jalan Setiabudi Raya No.22',
            'kota' => 'Bandung',
            'bintang' => 3,
            'deskripsi' => 'Hotel nyaman dengan harga terjangkau di pusat kota Bandung',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Santika Premiere',
            'alamat' => 'Jalan Gatot Subroto No.67',
            'kota' => 'Surabaya',
            'bintang' => 4,
            'deskripsi' => 'Hotel bintang 4 dengan pemandangan indah di kota Surabaya',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Amaris',
            'alamat' => 'Jalan Hayam Wuruk No.88',
            'kota' => 'Surabaya',
            'bintang' => 3,
            'deskripsi' => 'Hotel budget dengan fasilitas lengkap di pusat kota Surabaya',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Aston',
            'alamat' => 'Jalan Diponegoro No.123',
            'kota' => 'Semarang',
            'bintang' => 4,
            'deskripsi' => 'Hotel modern dengan akses strategis di kota Semarang',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Horison',
            'alamat' => 'Jalan Riau No.45',
            'kota' => 'Bandung',
            'bintang' => 3,
            'deskripsi' => 'Hotel di pusat kota Bandung dengan harga terjangkau',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Majapahit',
            'alamat' => 'Jalan Tunjungan No.65',
            'kota' => 'Surabaya',
            'bintang' => 5,
            'deskripsi' => 'Hotel bergaya kolonial di pusat kota Surabaya',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Mercure',
            'alamat' => 'Jalan Asia Afrika No.111',
            'kota' => 'Bandung',
            'bintang' => 4,
            'deskripsi' => 'Hotel modern dengan pemandangan Kota Bandung',
        ]);

        Hotel::create([
            'nama_hotel' => 'Hotel Marbella',
            'alamat' => 'Jalan Taman Sari No.21',
            'kota' => 'Jakarta',
            'bintang' => 4,
            'deskripsi' => 'Hotel mewah dengan fasilitas lengkap di kawasan elit Jakarta',
        ]);
    }
}
