<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;
    protected $table = 'tb_kontrak';

    protected $fillable = [
        'admin_id',
        'usul_pesanan',
        'sprinada',
        'prakualifikasi',
        'sph',
        'sppbj',
        'no_kontrak',
        'percentage',
    ];
}
