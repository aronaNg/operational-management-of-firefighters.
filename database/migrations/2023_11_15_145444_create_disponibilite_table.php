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
        Schema::create('disponibilite', function (Blueprint $table) {
            $table->id();
            $table->time('horaire_debut')
            ->nullable();
            $table->time('horaire_fin')
            ->nullable();
            $table
            ->foreignId('id_pompier')
            ->references('id')
            ->on('pompier')
            ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilite');
    }
};
