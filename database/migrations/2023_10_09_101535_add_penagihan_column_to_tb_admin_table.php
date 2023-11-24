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
            $table->integer('simb')->nullable()->default(0);
            $table->integer('sppm')->nullable()->default(0);
            $table->integer('surat_pengantar_barang_pt')->nullable()->default(0);
            $table->integer('packing_list_pt')->nullable()->default(0);
            $table->integer('invoice')->nullable()->default(0);
            $table->integer('packing_list')->nullable()->default(0);
            $table->integer('awb_bl')->nullable()->default(0);
            $table->integer('kontrak')->nullable()->default(0);
            $table->integer('amademen_kontrak')->nullable()->default(0);
            $table->integer('surat_pernyataan_barang')->nullable()->default(0);
            $table->integer('percentage_penagihan')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropColumn('simb');
            $table->dropColumn('sppm');
            $table->dropColumn('surat_pengantar_barang_pt');
            $table->dropColumn('packing_list_pt');
            $table->dropColumn('invoice');
            $table->dropColumn('packing_list');
            $table->dropColumn('awb_bl');
            $table->dropColumn('kontrak');
            $table->dropColumn('amademen_kontrak');
            $table->dropColumn('surat_pernyataan_barang');
            $table->dropColumn('percentage_penagihan');
        });
    }
};
