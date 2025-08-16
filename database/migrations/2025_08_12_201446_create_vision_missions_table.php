<?php
// File: database/migrations/xxxx_xx_xx_xxxxxx_create_vision_missions_table.php

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
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Visi Misi Desa');
            $table->text('description')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_content');
            $table->string('mission_title')->nullable();
            $table->text('mission_content');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_missions');
    }
};