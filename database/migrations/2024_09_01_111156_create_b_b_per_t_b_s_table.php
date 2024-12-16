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
        Schema::create('b_b_per_t_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kelamin');
            $table->string('indeks');
            $table->float('tinggi_badan', 3);
            $table->float('L', 8);
            $table->float('M', 8);
            $table->float('S', 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_b_per_t_b_s');
    }
};
