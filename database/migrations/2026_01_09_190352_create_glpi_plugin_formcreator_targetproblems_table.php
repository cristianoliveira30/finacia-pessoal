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
        Schema::create('glpi_plugin_formcreator_targetproblems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->unsignedInteger('plugin_formcreator_forms_id')->default(0);
            $table->string('target_name', 255)->default('');
            $table->unsignedInteger('problemtemplates_id')->default(0)->index('problemtemplates_id');
            $table->longText('content')->nullable();
            $table->longText('impactcontent')->nullable();
            $table->longText('causecontent')->nullable();
            $table->longText('symptomcontent')->nullable();
            $table->integer('urgency_rule')->default(1);
            $table->unsignedInteger('urgency_question')->default(0);
            $table->integer('destination_entity')->default(1);
            $table->unsignedInteger('destination_entity_value')->default(0);
            $table->integer('tag_type')->default(1);
            $table->string('tag_questions', 255)->default('');
            $table->string('tag_specifics', 255)->default('');
            $table->integer('category_rule')->default(1);
            $table->unsignedInteger('category_question')->default(0);
            $table->integer('show_rule')->default(1);
            $table->string('uuid', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_targetproblems');
    }
};
