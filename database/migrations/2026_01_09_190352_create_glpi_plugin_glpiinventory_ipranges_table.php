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
        Schema::create('glpi_plugin_glpiinventory_ipranges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('ip_start', 255)->nullable();
            $table->string('ip_end', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_ipranges');
    }
};
