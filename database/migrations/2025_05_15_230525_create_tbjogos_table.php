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
        Schema::create('tbjogos', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('descricao');
            $table->integer('ano');
            $table->string('genero');
            $table->string('plataformas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbjogos');
    }
};
