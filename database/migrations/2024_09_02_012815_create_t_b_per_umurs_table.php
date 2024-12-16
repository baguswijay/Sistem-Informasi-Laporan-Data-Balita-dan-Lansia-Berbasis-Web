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
        Schema::create('t_b_per_umurs', function (Blueprint $table) {
            $table->id();
            $table->integer('umur_bulan');
            $table->string('jenis_kelamin');
            $table->string('kondisi_badan');
            $table->float('L', 4);
            $table->float('M', 8);
            $table->float('S', 8);
            $table->float('SD', 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_b_per_umurs');
    }
};
