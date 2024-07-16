<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    // protected $fillable = ['hotel_id', 'nomor_kamar', 'tipe_kamar', 'harga', 'deskripsi'];

    // public function hotel()
    // {
    //     return $this->belongsTo(Hotel::class);
    // }

    // public function bookings()
    // {
    //     return $this->hasMany(Booking::class);
    // }
    protected $fillable = ['hotel_id' , 'nomor_kamar', 'tipe_kamar', 'harga', 'kapasitas', 'deskripsi'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->nomor_kamar = $model->generateNomorKamar();
        });
    }

    private function generateNomorKamar()
    {
        $lastKamar = Kamar::orderBy('id', 'desc')->first();
        $lastNumber = $lastKamar ? (int) $lastKamar->nomor_kamar : 0;
        return str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
