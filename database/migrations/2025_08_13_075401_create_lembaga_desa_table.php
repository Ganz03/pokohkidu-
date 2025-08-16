<?php
// database/migrations/2024_01_01_000000_create_lembaga_desa_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lembaga_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga');
            $table->string('slug')->unique();
            $table->string('singkatan')->nullable();
            $table->text('dasar_hukum')->nullable();
            $table->text('alamat_kantor')->nullable();
            $table->longText('profil')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->longText('tugas_pokok_fungsi')->nullable();
            $table->longText('hak')->nullable();
            $table->longText('kewajiban')->nullable();
            $table->longText('tugas_wewenang')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('foto_kantor_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan_tampil')->default(0);
            $table->json('galeri_foto')->nullable(); // untuk menyimpan multiple foto
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lembaga_desa');
    }
};