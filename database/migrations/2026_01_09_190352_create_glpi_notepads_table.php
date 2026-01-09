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
        Schema::create('glpi_notepads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('users_id_lastupdater')->default(0)->index('users_id_lastupdater');
            $table->longText('content')->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_notepads');
    }
};
