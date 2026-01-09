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
        Schema::create('glpi_racks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->string('serial', 255)->nullable();
            $table->string('otherserial', 255)->nullable();
            $table->unsignedInteger('rackmodels_id')->nullable()->index('rackmodels_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->unsignedInteger('racktypes_id')->default(0)->index('racktypes_id');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('group_id_tech');
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('depth')->nullable();
            $table->integer('number_units')->nullable()->default(0);
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->unsignedInteger('dcrooms_id')->default(0)->index('dcrooms_id');
            $table->integer('room_orientation')->default(0);
            $table->string('position', 50)->nullable();
            $table->string('bgcolor', 7)->nullable();
            $table->integer('max_power')->default(0);
            $table->integer('mesured_power')->default(0);
            $table->integer('max_weight')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_racks');
    }
};
