<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Admin extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'tb_admin';
    protected $fillable = [
        'no_up',
        'slug',
        'nama_pengadaan',
        'pt_id',
        'instansi_id',
        'jenis_anggaran',
        'tahun_anggaran',
        'pic_id',
        'vendor_id',
        'description',
        'percentage',
        'percentage',
        'status_satu',
        'status_dua',
        'status_tiga',
        'bebas_pajak',
        'bebas_pajak',
        'asal_brand',
        'waranty',
        'status_warraanty',
        'payment_term',
        'status_dp',
        'status_termin',
        'status_pajak',
        'status_brand',
        'date_step_dua',
        'no_kontrak',
        'nilai_kontrak',
        'jatuh_tempo',
        'tgl_kontrak',
        'status_project',
        'usul_pesanan',
        'sprinada',
        'prakualifikasi',
        'sph',
        'sppbj',
        'no_kontrak_kontrak',
        'percentage_kontrak',
        'baanname',
        'bainname',
        'bast',
        'jenis_pengiriman',
        'tgl_pengiriman',
        'no_bast',
        'tgl_bast',
        'percentage_pengiriman',
        'simb',
        'simb_tgl',
        'sppm',
        'sppm_tgl',
        'surat_pengantar_barang_pt',
        'surat_pengantar_barang_pt_tgl',
        'packing_list_pt',
        'packing_list_pt_tgl',
        'invoice',
        'invoice_tgl',
        'packing_list',
        'packing_list_tgl',
        'awb_bl',
        'awb_bl_tgl',
        'kontrak',
        'kontrak_tgl',
        'amademen_kontrak',
        'amademen_kontrak_tgl',
        'surat_pernyataan_barang',
        'surat_pernyataan_barang_tgl',
        'percentage_penagihan',
        'bobot_penagihan',
        'percentage_penagihan_all',
        'bobot_penagihan',
        'jumlah_item',
        'jumlah_ea',
        'jumlah_item_production',
        'jumlah_ea_production',
        'etd_production',
        'jumlah_item_delivery',
        'jumlah_ea_delivery',
        'etd_delivery',
        'jumlah_item_ready_stock',
        'jumlah_ea_ready_stock',
        'jumlah_item_received',
        'jumlah_ea_received',
        'percentage_marcendiser',
        'step_satu_marcendiser',
        'step_dua_marcendiser',
        'step_tiga_marcendiser',
        'step_empat_marcendiser',
        'status_marcendiser',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_pengadaan'
            ]
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pic_id', 'id');
    }

    public function pt(): BelongsTo
    {
        return $this->belongsTo(DaftarPT::class, 'pt_id', 'id');
    }

    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }

    public function vendor(): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'tb_admin_vendor', 'id_project', 'id_vendor');
    }

    public function sertifikat(): BelongsToMany
    {
        return $this->belongsToMany(Sertifikat::class, 'tb_admin_sertifikat', 'tb_admin_id', 'tb_sertifikat_id');
    }

    public function dpPenagihan(): BelongsTo
    {
        return $this->belongsTo(DpAdmin::class, 'id', 'project_id');
    }

    public function pengiriman(): BelongsTo
    {
        return $this->belongsTo(Pengiriman::class, 'id', 'id_project');
    }

    public function bobot(): BelongsTo
    {
        return $this->belongsTo(Bobot::class, 'id', 'project_id');
    }


    // public function user(): HasOne
    // {
    //     return $this->hasOne(User::class);
    // }
}
