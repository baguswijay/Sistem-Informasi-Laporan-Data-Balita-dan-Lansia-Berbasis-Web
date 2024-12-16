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
        Schema::table('pasiens', function (Blueprint $table) {
            $table->integer('anak_ke')->nullable()->after('nama');
            $table->string('nik', 16)->nullable()->after('anak_ke');
            $table->decimal('bbl', 5, 2)->nullable()->after('nik')->comment('Berat Badan Lahir dalam kg');
            $table->string('no_kk', 16)->nullable()->after('bbl');
            $table->boolean('imd')->nullable()->after('no_kk')->comment('Inisiasi Menyusu Dini');
            $table->string('no_hp', 15)->nullable()->after('imd');
            $table->string('no_rumah', 10)->nullable()->after('no_hp');
            $table->string('rt', 3)->nullable()->after('no_rumah');
            $table->string('rw', 3)->nullable()->after('rt');
            $table->decimal('pbl', 5, 2)->nullable()->after('rw')->comment('Panjang Badan Lahir');
            $table->time('jam_lahir')->nullable()->after('pbl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->dropColumn([
                'anak_ke',
                'nik',
                'bbl',
                'no_kk',
                'imd',
                'no_hp',
                'no_rumah',
                'rt',
                'rw',
                'pbl',
                'jam_lahir'
            ]);
        });
    }
};
