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
        Schema::create('equipement', function (Blueprint $table) {
            $table->id();
            $table->boolean('disponible')
            ->default(true);
            $table->foreignId('id_type_equipement')
                ->references('id')
                ->on('type_equipements')
                ->cascadeOnUpdate()
                ->constrained()
                ->onDelete('cascade');
            $table->date('date_achat')
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipement');
    }
};
