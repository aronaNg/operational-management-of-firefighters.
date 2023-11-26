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
        Schema::create('table_historiqueequip', function (Blueprint $table) {
            $table->id();
            $table->string('intitule')->unique();
            $table->timestamp('date_archivage')
            ->default(DB::raw('CURRENT_TIMESTAMP'))
            ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_historiqueequip');
    }
};
