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
        Schema::create('glpi_plugin_formcreator_questiondependencies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_formcreator_questions_id')->default(0)->index('plugin_formcreator_questions_id');
            $table->unsignedInteger('plugin_formcreator_questions_id_2')->default(0)->index('plugin_formcreator_questions_id_2');
            $table->string('fieldname', 255)->nullable();
            $table->string('uuid', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_questiondependencies');
    }
};
