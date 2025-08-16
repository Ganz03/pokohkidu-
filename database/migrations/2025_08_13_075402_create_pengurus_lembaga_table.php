<?php
// database/migrations/2024_01_01_000001_create_pengurus_lembaga_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengurus_lembaga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_desa_id')->constrained('lembaga_desa')->onDelete('cascade');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('pendidikan')->nullable();
            $table->string('nip')->nullable();
            $table->date('tanggal_mulai_jabatan')->nullable();
            $table->date('tanggal_berakhir_jabatan')->nullable();
            $table->string('foto_path')->nullable();
            $table->text('biodata')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan_tampil')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengurus_lembaga');
    }
};