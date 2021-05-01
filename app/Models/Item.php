<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'kategori_id',
        'tipe_id',
        'user_id',
        'judul',
        'foto',
        'keterangan',
        'lokasi',
        'kontak',
    ];
}
