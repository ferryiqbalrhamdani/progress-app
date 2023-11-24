<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'tb_pengiriman';

    protected $fillable = [
        'id_project',
        'no_baanname',
        'status_no_baanname',
        'tgl_baanname',
        'status_tgl_baanname',
        'no_bainname',
        'status_no_bainname',
        'tgl_bainname',
        'status_tgl_bainname',
    ];
}
