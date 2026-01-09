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
        Schema::create('glpi_plugin_formcreator_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false);
            $table->string('icon', 255)->default('');
            $table->string('icon_color', 255)->default('');
            $table->string('background_color', 255)->default('');
            $table->boolean('access_rights')->default(true);
            $table->string('description', 255)->nullable();
            $table->longText('content')->nullable();
            $table->unsignedInteger('plugin_formcreator_categories_id')->default(0)->index('plugin_formcreator_categories_id');
            $table->boolean('is_active')->default(false);
            $table->string('language', 255)->default('');
            $table->boolean('helpdesk_home')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->boolean('validation_required')->default(false);
            $table->integer('usage_count')->default(0);
            $table->boolean('is_default')->default(false);
            $table->tinyInteger('is_captcha_enabled')->default(0);
            $table->integer('show_rule')->default(1)->comment('Conditions setting to show the submit button');
            $table->string('formanswer_name', 255)->default('');
            $table->tinyInteger('is_visible')->default(1);
            $table->string('uuid', 255)->nullable();

            $table->fullText(['name', 'description'], 'search');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_forms');
    }
};
