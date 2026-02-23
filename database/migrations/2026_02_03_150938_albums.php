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
        Schema::create('albums', function (Blueprint $table) {

            $table->bigIncrements('id')->index();
            $table->string('titulo', 3000);
            $table->string('artista', 3000);
            $table->integer('año_publicacion');
            $table->string('genero', 3000);
            $table->string('discografia', 3000);
            $table->string('formato', 3000);
            $table->integer('nº pistas');
            $table->integer('minutos de duracion');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
