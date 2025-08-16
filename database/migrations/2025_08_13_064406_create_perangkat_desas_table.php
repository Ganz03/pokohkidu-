<?php
// database/migrations/create_perangkat_desas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perangkat_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan'); // Nama Jabatan
            $table->string('slug')->unique();
            $table->string('nama_pejabat')->nullable(); // Nama Pejabat
            $table->string('foto_path')->nullable();
            $table->text('tugas_fungsi')->nullable(); // Kedudukan, Tugas, Fungsi
            $table->text('wewenang')->nullable(); // Wewenang
            $table->text('hak')->nullable(); // Hak
            $table->text('kewajiban')->nullable(); // Kewajiban
            $table->string('nip')->nullable(); // NIP
            $table->string('pendidikan')->nullable(); // Pendidikan terakhir
            $table->date('tanggal_mulai_jabatan')->nullable(); // Mulai menjabat
            $table->integer('urutan_tampil')->default(0);
            $table->boolean('is_aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perangkat_desas');
    }
};