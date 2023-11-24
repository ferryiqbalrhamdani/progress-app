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
        Schema::create('tb_bobot_percentage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('tb_admin');
            $table->integer('bobot_kontrak')->default(0);
            $table->integer('bobot_penagihan')->default(0);
            $table->integer('bobot_pengiriman')->default(0);
            $table->integer('bobot_marcendiser')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bobot_percentage');
    }
};
