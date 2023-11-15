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
        Schema::create('intervention', function (Blueprint $table) {
            $table->id();
            $table->enum('statut', ['nouvelle', 'en cours','terminee'])
                ->default('nouvelle');
            $table->timestamp('date_heure')
                ->nullable();
            $table
            ->foreignId('id_incident')
            ->references('id')
            ->on('incident')
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
        Schema::dropIfExists('intervention');
    }
};
