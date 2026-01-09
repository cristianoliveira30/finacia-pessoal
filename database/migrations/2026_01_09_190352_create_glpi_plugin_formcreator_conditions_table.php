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
        Schema::create('glpi_plugin_formcreator_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 255)->default('')->comment('itemtype of the item affected by the condition');
            $table->integer('items_id')->default(0)->comment('item ID of the item affected by the condition');
            $table->integer('plugin_formcreator_questions_id')->default(0)->index('plugin_formcreator_questions_id')->comment('question to test for the condition');
            $table->integer('show_condition')->default(0);
            $table->mediumText('show_value')->nullable();
            $table->integer('show_logic')->default(1);
            $table->integer('order')->default(1);
            $table->string('uuid', 255)->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_conditions');
    }
};
