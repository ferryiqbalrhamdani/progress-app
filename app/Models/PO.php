<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PO extends Model
{
    use HasFactory;
    protected $table = 'tb_po';

    protected $fillable = [
        'project_id',
        'supplier',
        'no_po',
        'jumlah_item',
        'jumlah_ea',
        'no_invoice',
    ];

    public function po(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'project_id', 'id');
    }
}
