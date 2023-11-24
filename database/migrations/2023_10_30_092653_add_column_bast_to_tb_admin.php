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
            $table->enum('jenis_pengiriman', ['Lengkap', 'Bertahap'])->default('Lengkap')->after('bast');
            $table->date('tgl_pengiriman')->nullable()->after('jenis_pengiriman');
            $table->string('no_bast')->nullable()->after('tgl_pengiriman');
            $table->date('tgl_bast')->nullable()->after('no_bast');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropColumn('jenis_pengiriman');
            $table->dropColumn('tgl_pengiriman');
            $table->dropColumn('no_bast');
            $table->dropColumn('tgl_bast');
        });
    }
};
