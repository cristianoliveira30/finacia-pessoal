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
        Schema::create('glpi_plugin_os_rn', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('entities_id')->unique('entities_id');
            $table->string('rn', 50);

            $table->primary(['id', 'entities_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_os_rn');
    }
};
