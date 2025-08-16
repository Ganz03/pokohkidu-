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
        Schema::create('village_histories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Sejarah Desa Pokoh Kidul');
            $table->text('introduction')->nullable();
            $table->text('origin_story')->nullable();
            $table->text('pki_rebellion')->nullable();
            $table->text('reservoir_impact')->nullable();
            $table->text('government_history')->nullable();
            $table->text('cultural_heritage')->nullable();
            $table->string('author')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_histories');
    }
};