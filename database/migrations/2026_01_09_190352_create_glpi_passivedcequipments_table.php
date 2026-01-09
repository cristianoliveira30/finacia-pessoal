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
        Schema::create('glpi_passivedcequipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->string('serial', 255)->nullable();
            $table->string('otherserial', 255)->nullable();
            $table->unsignedInteger('passivedcequipmentmodels_id')->nullable()->index('passivedcequipmentmodels_id');
            $table->unsignedInteger('passivedcequipmenttypes_id')->default(0)->index('passivedcequipmenttypes_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('group_id_tech');
            $table->tinyInteger('is_template')->default(0)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_passivedcequipments');
    }
};
