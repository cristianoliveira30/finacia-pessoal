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
        Schema::create('glpi_plugin_formcreator_targettickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->integer('plugin_formcreator_forms_id')->default(0);
            $table->string('target_name', 255)->default('');
            $table->integer('source_rule')->default(0);
            $table->integer('source_question')->default(0);
            $table->integer('type_rule')->default(0);
            $table->unsignedInteger('type_question')->default(0);
            $table->integer('tickettemplates_id')->default(0)->index('tickettemplates_id');
            $table->longText('content')->nullable();
            $table->integer('due_date_rule')->default(1);
            $table->unsignedInteger('due_date_question')->default(0);
            $table->tinyInteger('due_date_value')->nullable();
            $table->integer('due_date_period')->default(0);
            $table->integer('urgency_rule')->default(1);
            $table->unsignedInteger('urgency_question')->default(0);
            $table->tinyInteger('validation_followup')->default(1);
            $table->integer('destination_entity')->default(1);
            $table->unsignedInteger('destination_entity_value')->default(0);
            $table->integer('tag_type')->default(1);
            $table->string('tag_questions', 255)->default('');
            $table->string('tag_specifics', 255)->default('');
            $table->integer('category_rule')->default(1);
            $table->unsignedInteger('category_question')->default(0);
            $table->integer('associate_rule')->default(1);
            $table->unsignedInteger('associate_question')->default(0);
            $table->integer('location_rule')->default(1);
            $table->unsignedInteger('location_question')->default(0);
            $table->integer('commonitil_validation_rule')->default(1);
            $table->string('commonitil_validation_question', 255)->nullable();
            $table->integer('show_rule')->default(1);
            $table->integer('sla_rule')->default(1);
            $table->unsignedInteger('sla_question_tto')->default(0);
            $table->unsignedInteger('sla_question_ttr')->default(0);
            $table->integer('ola_rule')->default(1);
            $table->unsignedInteger('ola_question_tto')->default(0);
            $table->unsignedInteger('ola_question_ttr')->default(0);
            $table->string('uuid', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_targettickets');
    }
};
