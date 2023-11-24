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
            $table->integer('jumlah_item')->nullable()->default(0);
            $table->integer('jumlah_ea')->nullable()->default(0);
            $table->integer('jumlah_item_production')->nullable()->default(0);
            $table->integer('jumlah_ea_production')->nullable()->default(0);
            $table->date('etd_production')->nullable();
            $table->integer('jumlah_item_delivery')->nullable()->default(0);
            $table->integer('jumlah_ea_delivery')->nullable()->default(0);
            $table->date('etd_delivery')->nullable();
            $table->integer('jumlah_item_ready_stock')->nullable()->default(0);
            $table->integer('jumlah_ea_ready_stock')->nullable()->default(0);
            $table->integer('jumlah_item_received')->nullable()->default(0);
            $table->integer('jumlah_ea_received')->nullable()->default(0);
            $table->integer('percentage_marcendiser')->nullable()->default(0);
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
