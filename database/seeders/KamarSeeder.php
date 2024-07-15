<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Kamar::firstOrCreate([
                'hotel_id' => rand(1, 10),
                'nomor_kamar' => $i, 
                'tipe_kamar' => 'Deluxe',
                'harga' => rand(500000, 2000000),
                'kapasitas' => rand(2, 4),
                'deskripsi' => 'Kamar dengan fasilitas lengkap dan pemandangan indah',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Kamar::firstOrCreate([
                'hotel_id' => rand(1, 10),
                'nomor_kamar' => $i, 
                'tipe_kamar' => 'Regular',
                'harga' => rand(200000, 600000),
                'kapasitas' => rand(1, 2),
                'deskripsi' => 'tempat ternyaman untuk beristirahat',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Kamar::firstOrCreate([
                'hotel_id' => rand(1, 10),
                'nomor_kamar' => $i, 
                'tipe_kamar' => 'Executive Room',
                'harga' => rand(1000000, 3000000),
                'kapasitas' => rand(2, 4),
                'deskripsi' =>'solusi tepat untuk para traveler',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Kamar::firstOrCreate([
                'hotel_id' => rand(1, 10),
                'nomor_kamar' => $i, 
                'tipe_kamar' => 'Suite' ,
                'harga' => rand(800000, 2500000),
                'kapasitas' => rand(2, 4),
                'deskripsi' => 'Kamar dengan fasilitas lengkap dan pemandangan indah',
            ]);
        }
    }
}
