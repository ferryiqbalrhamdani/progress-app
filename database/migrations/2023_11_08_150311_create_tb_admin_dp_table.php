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
        Schema::create('tb_admin_dp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('tb_admin');
            $table->integer('surat_permohonan')->nullable()->default(0);
            $table->timestamp('surat_permohonan_tgl')->nullable();
            $table->integer('kwitansi_pembayaran')->nullable()->default(0);
            $table->timestamp('kwitansi_pembayaran_tgl')->nullable();
            $table->integer('bap')->nullable()->default(0);
            $table->timestamp('bap_tgl')->nullable();
            $table->integer('ssp_ppn_pph')->nullable()->default(0);
            $table->timestamp('ssp_ppn_pph_tgl')->nullable();
            $table->integer('efaktur')->nullable()->default(0);
            $table->timestamp('efaktur_tgl')->nullable();
            $table->integer('kontrak')->nullable()->default(0);
            $table->timestamp('kontrak_tgl')->nullable();
            $table->integer('jamuk')->nullable()->default(0);
            $table->timestamp('jamuk_tgl')->nullable();
            $table->integer('sppbj')->nullable()->default(0);
            $table->timestamp('sppbj_tgl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_admin_dp');
    }
};
