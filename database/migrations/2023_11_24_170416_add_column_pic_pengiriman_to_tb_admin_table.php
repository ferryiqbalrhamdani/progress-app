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
            $table->unsignedBigInteger('pic_pengiriman')->nullable()->after('pic_penagihan');
            $table->foreign('pic_pengiriman')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropForeign('users_pic_pengiriman_foreign');
            $table->dropColumn('pic_pengiriman');
        });
    }
};
