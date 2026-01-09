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
        Schema::create('glpi_plugin_glpiinventory_credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0);
            $table->tinyInteger('is_recursive')->default(0);
            $table->string('name', 255)->default('');
            $table->string('username', 255)->default('');
            $table->string('password', 255)->default('');
            $table->text('comment')->nullable();
            $table->timestamp('date_mod')->nullable();
            $table->string('itemtype', 255)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_credentials');
    }
};
