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
        Schema::create('glpi_profilerights', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profiles_id')->default(0);
            $table->string('name', 255)->nullable()->index('name');
            $table->integer('rights')->default(0);

            $table->unique(['profiles_id', 'name'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_profilerights');
    }
};
