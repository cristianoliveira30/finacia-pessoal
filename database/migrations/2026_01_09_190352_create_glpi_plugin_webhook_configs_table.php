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
        Schema::create('glpi_plugin_webhook_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45)->unique('unicity');
            $table->integer('plugin_webhook_operationtypes_id')->default(0)->comment('operation type : POST, PUT, ...');
            $table->text('address')->nullable();
            $table->integer('plugin_webhook_secrettypes_id')->default(0)->comment('secret type : Basic Authentication, Personal Access Token, OAuth, ...');
            $table->text('secret')->nullable();
            $table->text('user')->nullable();
            $table->string('language', 10)->nullable();
            $table->tinyInteger('debug')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_webhook_configs');
    }
};
