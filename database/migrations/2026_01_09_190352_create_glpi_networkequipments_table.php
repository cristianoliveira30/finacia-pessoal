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
        Schema::create('glpi_networkequipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('ram')->nullable();
            $table->string('serial', 255)->nullable()->index('serial');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->string('contact', 255)->nullable();
            $table->string('contact_num', 255)->nullable();
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('networks_id')->default(0)->index('networks_id');
            $table->unsignedInteger('networkequipmenttypes_id')->default(0)->index('networkequipmenttypes_id');
            $table->unsignedInteger('networkequipmentmodels_id')->default(0)->index('networkequipmentmodels_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->decimal('ticket_tco', 20, 4)->nullable()->default(0);
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->string('uuid', 255)->nullable()->index('uuid');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->unsignedInteger('autoupdatesystems_id')->default(0)->index('autoupdatesystems_id');
            $table->mediumText('sysdescr')->nullable();
            $table->integer('cpu')->default(0);
            $table->string('uptime', 255)->default('0');
            $table->timestamp('last_inventory_update')->nullable();
            $table->unsignedInteger('snmpcredentials_id')->default(0)->index('snmpcredentials_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkequipments');
    }
};
