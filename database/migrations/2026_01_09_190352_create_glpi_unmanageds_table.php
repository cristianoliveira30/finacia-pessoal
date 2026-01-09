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
        Schema::create('glpi_unmanageds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('serial', 255)->nullable()->index('serial');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->string('contact', 255)->nullable();
            $table->string('contact_num', 255)->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('networks_id')->default(0)->index('networks_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->tinyInteger('is_dynamic')->default(0)->index('is_dynamic');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->unsignedInteger('autoupdatesystems_id')->default(0)->index('autoupdatesystems_id');
            $table->mediumText('sysdescr')->nullable();
            $table->unsignedInteger('agents_id')->default(0)->index('agents_id');
            $table->string('itemtype', 100)->nullable();
            $table->tinyInteger('accepted')->default(0);
            $table->tinyInteger('hub')->default(0);
            $table->string('ip', 255)->nullable();
            $table->unsignedInteger('snmpcredentials_id')->default(0)->index('snmpcredentials_id');
            $table->timestamp('last_inventory_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_unmanageds');
    }
};
