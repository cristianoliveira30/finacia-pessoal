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
        Schema::create('glpi_appliances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->default('')->index('name');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
            $table->unsignedInteger('appliancetypes_id')->default(0)->index('appliancetypes_id');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->unsignedInteger('applianceenvironments_id')->default(0)->index('applianceenvironments_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->string('externalidentifier', 255)->nullable()->unique('unicity');
            $table->string('serial', 255)->nullable()->index('serial');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->tinyInteger('is_helpdesk_visible')->default(1)->index('is_helpdesk_visible');
            $table->mediumText('pictures')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->string('contact', 255)->nullable();
            $table->string('contact_num', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_appliances');
    }
};
