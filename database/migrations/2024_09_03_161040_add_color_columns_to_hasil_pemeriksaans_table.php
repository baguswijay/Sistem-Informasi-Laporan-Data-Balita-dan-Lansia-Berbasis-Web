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
        Schema::table('hasil_pemeriksaans', function (Blueprint $table) {
            $table->string('bb_umur_color')->nullable()->after('bb_umur');
            $table->string('tb_umur_color')->nullable()->after('tb_umur');
            $table->string('status_gizi_color')->nullable()->after('status_gizi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasil_pemeriksaans', function (Blueprint $table) {
            $table->dropColumn('bb_umur_color');
            $table->dropColumn('tb_umur_color');
            $table->dropColumn('status_gizi_color');
        });
    }
};
