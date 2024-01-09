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
        Schema::create('tb_admin_vendor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tb_admin_id');
            $table->foreign('tb_admin_id')->references('id')->on('tb_admin');
            $table->unsignedBigInteger('tb_vendor_id');
            $table->foreign('tb_vendor_id')->references('id')->on('tb_vendor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_admin_vendor');
    }
};
