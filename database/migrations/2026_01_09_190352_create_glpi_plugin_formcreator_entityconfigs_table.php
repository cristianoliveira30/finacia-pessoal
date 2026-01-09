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
        Schema::create('glpi_plugin_formcreator_entityconfigs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->unique('unicity');
            $table->integer('replace_helpdesk')->default(-2);
            $table->integer('default_form_list_mode')->default(-2);
            $table->integer('sort_order')->default(-2);
            $table->integer('is_kb_separated')->default(-2);
            $table->integer('is_search_visible')->default(-2);
            $table->integer('is_dashboard_visible')->default(-2);
            $table->integer('is_header_visible')->default(-2);
            $table->integer('is_search_issue_visible')->default(-2);
            $table->integer('tile_design')->default(-2);
            $table->text('header')->nullable();
            $table->integer('service_catalog_home')->default(-2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_entityconfigs');
    }
};
