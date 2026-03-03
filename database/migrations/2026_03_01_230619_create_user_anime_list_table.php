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
        Schema::create('user_anime_list', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();

            $table->string('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreignId('info_anime_id')
                ->constrained('info_anime')
                ->cascadeOnDelete();

            $table->string('status')->default('planned');
            $table->integer('progress')->default(0);
            $table->decimal('rating', 3, 1)->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'info_anime_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_anime_list');
    }
};
