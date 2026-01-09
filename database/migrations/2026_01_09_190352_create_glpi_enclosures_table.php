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
        Schema::create('glpi_enclosures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->string('serial', 255)->nullable();
            $table->string('otherserial', 255)->nullable();
            $table->unsignedInteger('enclosuremodels_id')->nullable()->index('enclosuremodels_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('group_id_tech');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('orientation')->nullable();
            $table->boolean('power_supplies')->default(false);
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
        Schema::dropIfExists('glpi_enclosures');
    }
};
