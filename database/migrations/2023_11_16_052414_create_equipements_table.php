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
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('disponible')
            ->default(true);
            $table->foreignId('id_type_equipement')
                ->references('id')
                ->on('type_equipements')
                ->cascadeOnUpdate()
                ->constrained()
                ->onDelete('cascade');
            $table->timestamp('date_achat')
            ->default(DB::raw('CURRENT_TIMESTAMP'))
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};
