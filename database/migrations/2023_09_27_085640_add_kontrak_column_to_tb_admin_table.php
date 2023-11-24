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
            $table->integer('status_project')->default(0);
            $table->integer('usul_pesanan')->default(0);
            $table->integer('sprinada')->default(0);
            $table->integer('prakualifikasi')->default(0);
            $table->integer('sph')->default(0);
            $table->integer('sppbj')->default(0);
            $table->integer('no_kontrak_kontrak')->default(0);
            $table->integer('percentage_kontrak')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropColumn('status_project');
            $table->dropColumn('usul_pesanan');
            $table->dropColumn('sprinada');
            $table->dropColumn('prakualifikasi');
            $table->dropColumn('sph');
            $table->dropColumn('sppbj');
            $table->dropColumn('no_kontrak_kontrak');
            $table->dropColumn('percentage_kontrak');
        });
    }
};
