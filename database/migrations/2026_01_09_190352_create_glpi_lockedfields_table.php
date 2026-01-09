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
        Schema::create('glpi_lockedfields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->string('field', 50);
            $table->string('value', 255)->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->tinyInteger('is_global')->default(0)->index('is_global');
            $table->timestamp('date_mod')->nullable()->index('date_mod');

            $table->unique(['itemtype', 'items_id', 'field'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_lockedfields');
    }
};
