<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminAdmin extends Model
{
    use HasFactory;
    protected $table = 'tb_admin_termin';

    protected $fillable = [
        'name',
        'project_id',
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
        'efaktur',
        'efaktur_tgl',
        'sppbj',
        'sppbj_tgl',
    ];
}
