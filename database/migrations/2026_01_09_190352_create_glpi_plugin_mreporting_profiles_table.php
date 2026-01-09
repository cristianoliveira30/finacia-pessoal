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
        Schema::create('glpi_plugin_mreporting_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profiles_id')->default(0);
            $table->integer('reports')->default(0);
            $table->char('right', 1)->nullable();

            $table->unique(['profiles_id', 'reports'], 'profiles_id_reports');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_mreporting_profiles');
    }
};
