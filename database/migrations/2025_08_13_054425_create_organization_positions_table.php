<?php
// database/migrations/create_organization_positions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('organization_positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_name'); // Jabatan
            $table->string('slug')->unique();
            $table->string('person_name'); // Nama
            $table->string('photo_path')->nullable();
            $table->text('duties')->nullable(); // Kedudukan, Tugas, Fungsi
            $table->text('authorities')->nullable(); // Wewenang
            $table->text('rights')->nullable(); // Hak
            $table->text('obligations')->nullable(); // Kewajiban
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organization_positions');
    }
};