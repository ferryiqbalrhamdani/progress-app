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
        Schema::create('tb_kontrak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('tb_admin');
            $table->integer('usul_pesanan')->default(0);
            $table->integer('sprinada')->default(0);
            $table->integer('prakualifikasi')->default(0);
            $table->integer('sph')->default(0);
            $table->integer('sppbj')->default(0);
            $table->integer('no_kontrak')->default(0);
            $table->integer('percentage')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kontrak');
    }
};
