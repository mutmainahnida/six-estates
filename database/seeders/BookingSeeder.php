<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $tanggal_check_in = Carbon::now()->addDays(rand(1, 30));
            $tanggal_check_out = (clone $tanggal_check_in)->addDays(rand(1, 14));
            $kamar = Kamar::inRandomOrder()->first();
            $total_harga = $kamar->harga * $tanggal_check_in->diffInDays($tanggal_check_out);

            Booking::create([
                'user_id' => rand(1, 10), // assuming you have 10 users
                'kamar_id' => $kamar->id,
                'tanggal_check_in' => $tanggal_check_in,
                'tanggal_check_out' => $tanggal_check_out,
                'total_harga' => $total_harga,
                'status' => 'confirmed',
            ]);
        }
    }
}
