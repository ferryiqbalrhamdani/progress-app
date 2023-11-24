<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->date('simb_tgl')->nullable()->after('simb');
            $table->date('sppm_tgl')->nullable()->after('sppm');
            $table->date('surat_pengantar_barang_pt_tgl')->nullable()->after('surat_pengantar_barang_pt');
            $table->date('packing_list_pt_tgl')->nullable()->after('packing_list_pt');
            $table->date('invoice_tgl')->nullable()->after('invoice');
            $table->date('packing_list_tgl')->nullable()->after('packing_list');
            $table->date('awb_bl_tgl')->nullable()->after('awb_bl');
            $table->date('kontrak_tgl')->nullable()->after('kontrak');
            $table->date('amademen_kontrak_tgl')->nullable()->after('amademen_kontrak');
            $table->date('surat_pernyataan_barang_tgl')->nullable()->after('surat_pernyataan_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropColumn('simb_tgl');
            $table->dropColumn('sppm_tgl');
            $table->dropColumn('surat_pengantar_barang_pt_tgl');
            $table->dropColumn('packing_list_pt_tgl');
            $table->dropColumn('invoice_tgl');
            $table->dropColumn('packing_list_tgl');
            $table->dropColumn('awb_bl_tgl');
            $table->dropColumn('kontrak_tgl');
            $table->dropColumn('amademen_kontrak_tgl');
            $table->dropColumn('surat_pernyataan_barang_tgl');
        });
    }
};
