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
        Schema::create('glpi_plugins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('directory', 255)->unique('unicity');
            $table->string('name', 255)->index('name');
            $table->string('version', 255);
            $table->integer('state')->default(0)->index('state')->comment('see define.php PLUGIN_* constant');
            $table->string('author', 255)->nullable();
            $table->string('homepage', 255)->nullable();
            $table->string('license', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugins');
    }
};
