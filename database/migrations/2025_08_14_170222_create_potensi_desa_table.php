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
        Schema::create('potensi_desa', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->default(date('Y'));
            
            // Potensi Penduduk
            $table->integer('jumlah_penduduk_laki')->default(0);
            $table->integer('jumlah_penduduk_perempuan')->default(0);
            $table->integer('jumlah_kepala_keluarga')->default(0);
            $table->decimal('kepadatan_penduduk', 8, 2)->default(0); // per km2
            
            // Potensi Wilayah
            $table->decimal('luas_wilayah', 10, 2)->default(0); // dalam km2
            $table->text('batas_wilayah_utara')->nullable();
            $table->text('batas_wilayah_selatan')->nullable();
            $table->text('batas_wilayah_timur')->nullable();
            $table->text('batas_wilayah_barat')->nullable();
            $table->text('orbitasi_desa')->nullable();
            $table->json('jenis_lahan')->nullable(); // [{nama: 'Persawahan', luas: 100}]
            $table->text('potensi_wisata')->nullable();
            
            // Sarana & Prasarana
            $table->text('kantor_desa')->nullable();
            $table->json('lembaga_pemerintahan')->nullable();
            $table->json('sarana_prasarana_pkk')->nullable();
            $table->json('sarana_prasarana_pendidikan')->nullable();
            $table->json('sarana_prasarana_peribadatan')->nullable();
            $table->json('sarana_prasarana_kesehatan')->nullable();
            $table->json('sarana_prasarana_air_bersih')->nullable();
            $table->json('sarana_prasarana_irigasi')->nullable();
            
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_desa');
    }
};