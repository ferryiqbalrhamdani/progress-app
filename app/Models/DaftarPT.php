<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPT extends Model
{
    use HasFactory;

    protected $table = 'tb_pt';
    
    protected $fillable = [
        'name'
    ];
}
