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
        Schema::create('glpi_plugin_formcreator_formanswers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->unsignedInteger('entities_id')->default(0);
            $table->boolean('is_recursive')->default(false);
            $table->unsignedInteger('plugin_formcreator_forms_id')->default(0)->index('plugin_formcreator_forms_id');
            $table->unsignedInteger('requester_id')->default(0)->index('requester_id');
            $table->unsignedInteger('users_id_validator')->default(0)->index('users_id_validator');
            $table->unsignedInteger('groups_id_validator')->default(0)->index('groups_id_validator');
            $table->timestamp('request_date')->nullable();
            $table->integer('status')->default(101);
            $table->mediumText('comment')->nullable();

            $table->index(['entities_id', 'is_recursive'], 'entities_id_is_recursive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_formanswers');
    }
};
