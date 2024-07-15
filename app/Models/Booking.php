<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kamar_id',
        'tanggal_check_in',
        'tanggal_check_out',
        'total_harga',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relationship with User
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
