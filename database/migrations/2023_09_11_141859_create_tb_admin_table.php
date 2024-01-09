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
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->id();
            $table->string('no_up')->unique();
            $table->string('slug')->nullable();
            $table->string('nama_pengadaan');
            $table->unsignedBigInteger('pt_id');
            $table->foreign('pt_id')->references('id')->on('tb_pt');
            $table->unsignedBigInteger('instansi_id');
            $table->foreign('instansi_id')->references('id')->on('tb_instansi');
            $table->string('jenis_anggaran');
            $table->string('tahun_anggaran');
            $table->unsignedBigInteger('pic_id');
            $table->foreign('pic_id')->references('id')->on('users');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('tb_vendor');
            $table->text('description')->nullable()->default('text');
            $table->integer('percentage')->default(0);
            $table->integer('status_satu')->default(0);
            $table->integer('status_dua')->nullable();
            $table->integer('status_tiga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_admin');
    }
};
