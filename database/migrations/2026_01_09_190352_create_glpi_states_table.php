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
        Schema::create('glpi_states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('states_id')->default(0);
            $table->mediumText('completename')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();
            $table->boolean('is_visible_computer')->default(true)->index('is_visible_computer');
            $table->boolean('is_visible_monitor')->default(true)->index('is_visible_monitor');
            $table->boolean('is_visible_networkequipment')->default(true)->index('is_visible_networkequipment');
            $table->boolean('is_visible_peripheral')->default(true)->index('is_visible_peripheral');
            $table->boolean('is_visible_phone')->default(true)->index('is_visible_phone');
            $table->boolean('is_visible_printer')->default(true)->index('is_visible_printer');
            $table->boolean('is_visible_softwareversion')->default(true)->index('is_visible_softwareversion');
            $table->boolean('is_visible_softwarelicense')->default(true)->index('is_visible_softwarelicense');
            $table->boolean('is_visible_line')->default(true)->index('is_visible_line');
            $table->boolean('is_visible_certificate')->default(true)->index('is_visible_certificate');
            $table->boolean('is_visible_rack')->default(true)->index('is_visible_rack');
            $table->tinyInteger('is_visible_passivedcequipment')->default(1)->index('is_visible_passivedcequipment');
            $table->boolean('is_visible_enclosure')->default(true)->index('is_visible_enclosure');
            $table->boolean('is_visible_pdu')->default(true)->index('is_visible_pdu');
            $table->tinyInteger('is_visible_cluster')->default(1)->index('is_visible_cluster');
            $table->tinyInteger('is_visible_contract')->default(1)->index('is_visible_contract');
            $table->tinyInteger('is_visible_appliance')->default(1)->index('is_visible_appliance');
            $table->tinyInteger('is_visible_databaseinstance')->default(1)->index('is_visible_databaseinstance');
            $table->tinyInteger('is_visible_cable')->default(1)->index('is_visible_cable');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->unique(['states_id', 'name'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_states');
    }
};
