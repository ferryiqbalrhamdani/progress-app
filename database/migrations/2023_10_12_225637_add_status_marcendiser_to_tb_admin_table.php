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
            $table->integer('step_satu_marcendiser')->nullable()->default(1);
            $table->integer('step_dua_marcendiser')->nullable()->default(0);
            $table->integer('step_tiga_marcendiser')->nullable()->default(0);
            $table->integer('step_empat_marcendiser')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin', function (Blueprint $table) {
            $table->dropColumn('step_satu_marcendiser');
            $table->dropColumn('step_dua_marcendiser');
            $table->dropColumn('step_tiga_marcendiser');
            $table->dropColumn('step_empat_marcendiser');
        });
    }
};
