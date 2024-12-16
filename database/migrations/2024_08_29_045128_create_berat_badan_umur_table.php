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
        Schema::create('berat_badan_umur', function (Blueprint $table) {
            $table->id();
            $table->integer('umur_bulan');
            $table->string('jenis_kelamin');
            $table->float('L', 8);
            $table->float('M', 8);
            $table->float('S', 8);
            $table->float('-3sd', 8);
            $table->float('-2sd', 8);
            $table->float('-1sd', 8);
            $table->float('median', 8);
            $table->float('+1sd', 8);
            $table->float('+2sd', 8);
            $table->float('+3sd', 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berat_badan_umur');
    }
};
