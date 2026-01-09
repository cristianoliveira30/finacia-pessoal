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
        Schema::create('glpi_plugin_formcreator_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->unsignedInteger('plugin_formcreator_sections_id')->default(0)->index('plugin_formcreator_sections_id');
            $table->string('fieldtype', 30)->default('text');
            $table->boolean('required')->default(false);
            $table->boolean('show_empty')->default(false);
            $table->mediumText('default_values')->nullable();
            $table->string('itemtype', 255)->default('');
            $table->mediumText('values')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('row')->default(0);
            $table->integer('col')->default(0);
            $table->integer('width')->default(0);
            $table->integer('show_rule')->default(1);
            $table->string('uuid', 255)->nullable();

            $table->fullText(['name', 'description'], 'search');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_questions');
    }
};
