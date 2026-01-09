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
        Schema::create('glpi_plugin_glpiinventory_deploypackages_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_glpiinventory_deploypackages_id')->default(0)->index('plugin_glpiinventory_deploypackages_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_deploypackages_users');
    }
};
