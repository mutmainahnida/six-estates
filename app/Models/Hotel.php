<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['nama_hotel', 'alamat', 'kota', 'bintang', 'deskripsi'];

    public function kamars()
    {
        return $this->hasMany(Kamar::class);
    }
}