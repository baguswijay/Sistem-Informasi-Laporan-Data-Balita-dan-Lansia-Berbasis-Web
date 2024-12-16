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
        Schema::create('standar_antropometris', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_kelamin', ['L', 'P'] );
            $table->integer('umur_bulan')->nullable();
            $table->enum('kelompok_umur', ['0-24', '24-60'])->nullable();
            $table->decimal('tinggi_badan', 3,1)->nullable();
            $table->enum('indeks', ['BB/U', 'TB/U', 'BB/TB', 'IMT/U']);
            $table->decimal('median', 3,1);
            $table->decimal('sd_negatif_1', 3,1);
            $table->decimal('sd_negatif_2', 3,1);
            $table->decimal('sd_negatif_3', 3,1);
            $table->decimal('sd_positif_1', 3,1);
            $table->decimal('sd_positif_2', 3,1);
            $table->decimal('sd_positif_3', 3,1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standar_antropometris');
    }
};
