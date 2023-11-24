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
            $table->timestamp('usul_pesanan_tgl')->nullable()->after('usul_pesanan');
            $table->timestamp('sprinada_tgl')->nullable()->after('sprinada');
            $table->timestamp('prakualifikasi_tgl')->nullable()->after('prakualifikasi');
            $table->timestamp('sph_tgl')->nullable()->after('sph');
            $table->timestamp('sppbj_tgl')->nullable()->after('sppbj');
            $table->timestamp('no_kontrak_kontrak_tgl')->nullable()->after('no_kontrak_kontrak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropColumn('usul_pesanan_tgl');
            $table->dropColumn('sprinada_tgl');
            $table->dropColumn('prakualifikasi_tgl');
            $table->dropColumn('sppbj_tgl');
            $table->dropColumn('no_kontrak_kontrak_tgl');
        });
    }
};
