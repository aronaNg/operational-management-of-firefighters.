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
        Schema::create('vehicule', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->boolean('disponible')
            ->default(true);
            $table->date('date_achat')
            ->nullable();
            $table->foreignId('id_type_vehicule')
            ->references('id')
            ->on('type_vehicules')
            ->cascadeOnUpdate()
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicule');
    }
};
