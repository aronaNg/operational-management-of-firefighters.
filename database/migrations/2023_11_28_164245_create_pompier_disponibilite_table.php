<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pompier_disponibilite', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pompier_id');
        $table->unsignedBigInteger('disponibilite_id');
        $table->timestamps();

        $table->foreign('pompier_id')->references('id')->on('pompiers')->onDelete('cascade');
        $table->foreign('disponibilite_id')->references('id')->on('disponibilites')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pompier_disponibilite');
    }
};
