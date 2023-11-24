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
        Schema::table('tb_pengiriman', function (Blueprint $table) {
            $table->integer('status_no_baanname')->default(0)->after('no_baanname');
            $table->integer('status_tgl_baanname')->default(0)->after('tgl_baanname');
            $table->integer('status_no_bainname')->default(0)->after('no_bainname');
            $table->integer('status_tgl_bainname')->default(0)->after('tgl_bainname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_pengiriman', function (Blueprint $table) {
            $table->dropColumn('status_no_baanname');
            $table->dropColumn('status_tgl_baanname');
            $table->dropColumn('status_no_bainname');
            $table->dropColumn('status_tgl_bainname');
        });
    }
};
