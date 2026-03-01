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
        Schema::create('info_anime', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id()->primary();
            $table->string('title');
            $table->string('original_title');
            $table->string('image_url');
            $table->string('release_date');
            $table->string('genre');
            $table->string('slug');
            $table->text('sinopsis');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_anime');
    }
};
