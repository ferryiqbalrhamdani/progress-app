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
            $table->integer('baanname')->nullable()->default(0);
            $table->integer('bainname')->nullable()->default(0);
            $table->integer('bast')->nullable()->default(0);
            $table->integer('percentage_pengiriman')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropColumn('baanname');
            $table->dropColumn('bainname');
            $table->dropColumn('bast');
            $table->dropColumn('percentage_pengiriman');
        });
    }
};
