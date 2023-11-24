<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;

    protected $table = 'tb_bobot_percentage';

    protected $fillable = [
        'project_id',
        'bobot_kontrak',
        'bobot_penagihan',
        'bobot_pengiriman',
        'bobot_marcendiser',
    ];
}
