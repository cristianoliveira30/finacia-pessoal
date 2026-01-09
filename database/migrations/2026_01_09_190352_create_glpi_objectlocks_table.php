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
        Schema::create('glpi_objectlocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->comment('Type of locked object');
            $table->unsignedInteger('items_id');
            $table->unsignedInteger('users_id')->index('users_id');
            $table->timestamp('date')->useCurrent()->index('date');

            $table->unique(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_objectlocks');
    }
};
