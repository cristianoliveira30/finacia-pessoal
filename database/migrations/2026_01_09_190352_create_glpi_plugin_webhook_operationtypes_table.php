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
        Schema::create('glpi_plugin_webhook_operationtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45)->unique('glpi_plugin_webhook_operationtype_name');
            $table->string('comment', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_webhook_operationtypes');
    }
};
