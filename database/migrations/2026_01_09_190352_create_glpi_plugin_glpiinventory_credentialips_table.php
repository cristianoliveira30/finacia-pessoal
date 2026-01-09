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
        Schema::create('glpi_plugin_glpiinventory_credentialips', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0);
            $table->unsignedInteger('plugin_glpiinventory_credentials_id')->default(0)->index('plugin_glpiinventory_credentials_id');
            $table->string('name', 255)->default('');
            $table->text('comment')->nullable();
            $table->string('ip', 255)->default('');
            $table->timestamp('date_mod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_credentialips');
    }
};
