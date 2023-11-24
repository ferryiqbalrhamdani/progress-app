<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    use HasFactory;

    protected $table = 'tb_termin';
    protected $fillable = [
        'name',
        'id_project',
        'value',
    ];
}
