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
        Schema::create('apb_desa', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('foto')->nullable();
            $table->text('excerpt')->nullable();
            $table->year('tahun');
            $table->date('tanggal_publikasi');
            
            // 1. Pendapatan Desa
            // Pendapatan Asli Desa
            $table->bigInteger('pad_hasil_usaha_rencana')->default(0);
            $table->bigInteger('pad_hasil_usaha_realisasi')->default(0);
            $table->bigInteger('pad_hasil_aset_rencana')->default(0);
            $table->bigInteger('pad_hasil_aset_realisasi')->default(0);
            $table->bigInteger('pad_swadaya_rencana')->default(0);
            $table->bigInteger('pad_swadaya_realisasi')->default(0);
            
            // Pendapatan Transfer
            $table->bigInteger('transfer_dana_desa_rencana')->default(0);
            $table->bigInteger('transfer_dana_desa_realisasi')->default(0);
            $table->bigInteger('transfer_bagi_hasil_rencana')->default(0);
            $table->bigInteger('transfer_bagi_hasil_realisasi')->default(0);
            $table->bigInteger('transfer_alokasi_dana_rencana')->default(0);
            $table->bigInteger('transfer_alokasi_dana_realisasi')->default(0);
            $table->bigInteger('transfer_bantuan_kab_rencana')->default(0);
            $table->bigInteger('transfer_bantuan_kab_realisasi')->default(0);
            $table->bigInteger('transfer_bantuan_prov_rencana')->default(0);
            $table->bigInteger('transfer_bantuan_prov_realisasi')->default(0);
            
            // Pendapatan Lain-lain
            $table->bigInteger('lain_hibah_rencana')->default(0);
            $table->bigInteger('lain_hibah_realisasi')->default(0);
            $table->bigInteger('lain_sumbangan_rencana')->default(0);
            $table->bigInteger('lain_sumbangan_realisasi')->default(0);
            $table->bigInteger('lain_pendapatan_rencana')->default(0);
            $table->bigInteger('lain_pendapatan_realisasi')->default(0);
            
            // 2. Belanja Desa
            $table->bigInteger('belanja_pemerintahan_rencana')->default(0);
            $table->bigInteger('belanja_pemerintahan_realisasi')->default(0);
            $table->bigInteger('belanja_pembangunan_rencana')->default(0);
            $table->bigInteger('belanja_pembangunan_realisasi')->default(0);
            $table->bigInteger('belanja_kemasyarakatan_rencana')->default(0);
            $table->bigInteger('belanja_kemasyarakatan_realisasi')->default(0);
            $table->bigInteger('belanja_pemberdayaan_rencana')->default(0);
            $table->bigInteger('belanja_pemberdayaan_realisasi')->default(0);
            $table->bigInteger('belanja_tak_terduga_rencana')->default(0);
            $table->bigInteger('belanja_tak_terduga_realisasi')->default(0);
            
            // 3. Pembiayaan Desa
            // Penerimaan Pembiayaan
            $table->bigInteger('penerimaan_silpa_rencana')->default(0);
            $table->bigInteger('penerimaan_silpa_realisasi')->default(0);
            $table->bigInteger('penerimaan_dana_cadangan_rencana')->default(0);
            $table->bigInteger('penerimaan_dana_cadangan_realisasi')->default(0);
            $table->bigInteger('penerimaan_hasil_penjualan_rencana')->default(0);
            $table->bigInteger('penerimaan_hasil_penjualan_realisasi')->default(0);
            
            // Pengeluaran Pembiayaan
            $table->bigInteger('pengeluaran_dana_cadangan_rencana')->default(0);
            $table->bigInteger('pengeluaran_dana_cadangan_realisasi')->default(0);
            $table->bigInteger('pengeluaran_modal_desa_rencana')->default(0);
            $table->bigInteger('pengeluaran_modal_desa_realisasi')->default(0);
            
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apb_desa');
    }
};