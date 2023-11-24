<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DpAdmin extends Model
{
    use HasFactory;

    protected $table = 'tb_admin_dp';

    protected $fillable = [
        'project_id',
        'percentage',
        'bobot',
        'surat_permohonan',
        'surat_permohonan_tgl',
        'kwitansi_pembayaran',
        'kwitansi_pembayaran_tgl',
        'bap',
        'bap_tgl',
        'ssp_ppn_pph',
        'ssp_ppn_pph_tgl',
        'efaktur',
        'efaktur_tgl',
        'kontrak',
        'kontrak_tgl',
        'jamuk',
        'jamuk_tgl',
        'sppbj',
        'sppbj_tgl',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'project_id', 'id');
    }
}
