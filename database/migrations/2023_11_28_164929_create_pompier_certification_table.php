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
        Schema::create('pompier_certification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pompier_id');
            $table->unsignedBigInteger('certification_id');
            $table->timestamps();

            $table->foreign('pompier_id')->references('id')->on('pompiers')->onDelete('cascade');
            $table->foreign('certification_id')->references('id')->on('certifications')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pompier_certification');
    }
};
