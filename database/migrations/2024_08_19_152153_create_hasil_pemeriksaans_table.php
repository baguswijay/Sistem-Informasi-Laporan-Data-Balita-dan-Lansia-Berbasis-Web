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
        Schema::create('hasil_pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained()->cascadeOnDelete();
            $table->decimal('tb', 5, 2)->nullable();
            $table->decimal('bb', 5, 2)->nullable();
            $table->integer('umur')->nullable();
            $table->string('bb_umur')->nullable();
            $table->string('tb_umur')->nullable();
            $table->string('status_gizi')->nullable();
            $table->string('vitamin')->nullable();
            $table->string('imunisasi')->nullable();
            $table->decimal('lingkar_lengan', 5, 2)->nullable();
            $table->decimal('lingkar_kepala', 5, 2)->nullable();
            $table->decimal('lingkar_perut', 5, 2)->nullable();
            $table->string('asi')->nullable();
            $table->string('tensi')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_pemeriksaans');
    }
};
