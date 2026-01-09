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
        Schema::create('glpi_plugin_glpiinventory_deploymirrors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->index('entities_id');
            $table->tinyInteger('is_active')->default(0)->index('is_active');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255);
            $table->string('url', 255)->default('');
            $table->unsignedInteger('locations_id');
            $table->text('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_deploymirrors');
    }
};
