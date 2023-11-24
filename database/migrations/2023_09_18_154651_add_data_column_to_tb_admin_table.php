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
            $table->string('bebas_pajak', 100)->nullable();
            $table->string('asal_brand', 100)->nullable();
            $table->string('waranty', 100)->nullable();
            $table->integer('status_warraanty')->nullable();
            $table->string('payment_term', 100)->nullable();
            $table->integer('status_dp')->nullable();
            $table->integer('status_termin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            //
        });
    }
};
