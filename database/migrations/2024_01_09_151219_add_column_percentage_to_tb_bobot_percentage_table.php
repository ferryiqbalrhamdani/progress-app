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
        Schema::table('tb_bobot_percentage', function (Blueprint $table) {
            $table->integer('total_bobot')->after('bobot_marcendiser')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_bobot_percentage', function (Blueprint $table) {
            $table->dropColumn('total_bobot');
        });
    }
};
