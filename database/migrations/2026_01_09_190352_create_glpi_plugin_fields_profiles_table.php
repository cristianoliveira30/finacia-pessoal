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
        Schema::create('glpi_plugin_fields_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profiles_id')->default(0)->index('profiles_id');
            $table->unsignedInteger('plugin_fields_containers_id')->default(0)->index('plugin_fields_containers_id');
            $table->char('right', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_fields_profiles');
    }
};
