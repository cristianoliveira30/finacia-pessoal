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
        Schema::create('glpi_manuallinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('url', 8096);
            $table->tinyInteger('open_window')->default(1);
            $table->string('icon', 255)->nullable();
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('items_id')->default(0)->index('items_id');
            $table->string('itemtype', 255)->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_manuallinks');
    }
};
