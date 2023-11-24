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
            $table->unsignedBigInteger('pic_penagihan')->nullable()->after('pic_handle');
            $table->foreign('pic_penagihan')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropForeign('users_pic_penagihan_foreign');
            $table->dropColumn('pic_penagihan');
        });
    }
};
