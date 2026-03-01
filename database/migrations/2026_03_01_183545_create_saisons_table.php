<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('info_anime_id');
            $table->tinyInteger('numero')->unsigned();
            $table->year('annee')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();

            $table->foreign('info_anime_id')
                ->references('id')
                ->on('info_anime')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saisons');
    }
};
