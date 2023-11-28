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
         Schema::create('pompier_competence', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('pompier_id');
             $table->unsignedBigInteger('competence_id');
             $table->timestamps();

             $table->foreign('pompier_id')->references('id')->on('pompiers')->onDelete('cascade');
             $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
         });
     }

     public function down()
     {
         Schema::dropIfExists('pompier_competence');
     }
};
