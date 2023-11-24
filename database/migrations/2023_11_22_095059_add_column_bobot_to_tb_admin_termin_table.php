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
        Schema::table('tb_admin_termin', function (Blueprint $table) {
            $table->float('bobot')->default(0)->after('percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_admin_termin', function (Blueprint $table) {
            $table->dropColumn('bobot');
        });
    }
};
