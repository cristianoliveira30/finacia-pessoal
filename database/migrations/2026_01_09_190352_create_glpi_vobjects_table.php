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
        Schema::create('glpi_vobjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->mediumText('data')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_vobjects');
    }
};
