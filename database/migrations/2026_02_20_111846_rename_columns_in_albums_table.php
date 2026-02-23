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
        Schema::table('albums', function (Blueprint $table) {
            $table->renameColumn('año_publicacion', 'anio_publicacion');
            $table->renameColumn('nº pistas', 'num_pistas');
            $table->renameColumn('minutos de duracion', 'minutos_duracion');
        });
    }

    public function down(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->renameColumn('anio_publicacion', 'año_publicacion');
            $table->renameColumn('num_pistas', 'nº pistas');
            $table->renameColumn('minutos_duracion', 'minutos de duracion');
        });
    }
};
