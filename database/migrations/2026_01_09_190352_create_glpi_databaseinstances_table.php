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
        Schema::create('glpi_databaseinstances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->default('')->index('name');
            $table->string('version', 255)->default('');
            $table->string('port', 10)->default('');
            $table->string('path', 255)->default('');
            $table->integer('size')->default(0);
            $table->unsignedInteger('databaseinstancetypes_id')->default(0)->index('databaseinstancetypes_id');
            $table->unsignedInteger('databaseinstancecategories_id')->default(0)->index('databaseinstancecategories_id');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->string('itemtype', 100)->default('');
            $table->unsignedInteger('items_id')->default(0);
            $table->tinyInteger('is_onbackup')->default(0);
            $table->tinyInteger('is_active')->default(0)->index('is_active');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
            $table->tinyInteger('is_helpdesk_visible')->default(1)->index('is_helpdesk_visible');
            $table->tinyInteger('is_dynamic')->default(0)->index('is_dynamic');
            $table->unsignedInteger('autoupdatesystems_id')->default(0)->index('autoupdatesystems_id');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_lastboot')->nullable();
            $table->timestamp('date_lastbackup')->nullable();
            $table->mediumText('comment')->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_databaseinstances');
    }
};
