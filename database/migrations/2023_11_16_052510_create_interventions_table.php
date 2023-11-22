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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->enum('statut', ['nouvelle', 'en cours','terminee'])
                ->default('nouvelle');
            $table->timestamp('date_heure')
                ->nullable();
            $table
            ->foreignId('id_type_incident')
            ->references('id')
            ->on('incidents')
            ->cascadeOnUpdate()
            ->constrained()
            ->onDelete('cascade');
            $table
            ->foreignId('id_pompier')
            ->references('id')
            ->on('pompiers')
            ->cascadeOnUpdate()
            ->constrained()
            ->onDelete('cascade');
            $table
            ->foreignId('id_vehicule')
            ->references('id')
            ->on('vehicules')
            ->cascadeOnUpdate()
            ->constrained()
            ->onDelete('cascade');
            $table
            ->foreignId('id_equipement')
            ->references('id')
            ->on('equipements')
            ->cascadeOnUpdate()
            ->constrained()
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
