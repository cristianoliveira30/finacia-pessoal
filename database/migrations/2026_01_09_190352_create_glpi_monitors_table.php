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
        Schema::create('glpi_monitors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->string('contact', 255)->nullable();
            $table->string('contact_num', 255)->nullable();
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->mediumText('comment')->nullable();
            $table->string('serial', 255)->nullable()->index('serial');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->decimal('size', 5)->default(0);
            $table->boolean('have_micro')->default(false);
            $table->boolean('have_speaker')->default(false);
            $table->boolean('have_subd')->default(false);
            $table->boolean('have_bnc')->default(false);
            $table->boolean('have_dvi')->default(false);
            $table->boolean('have_pivot')->default(false);
            $table->boolean('have_hdmi')->default(false);
            $table->boolean('have_displayport')->default(false);
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('monitortypes_id')->default(0)->index('monitortypes_id');
            $table->unsignedInteger('monitormodels_id')->default(0)->index('monitormodels_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->boolean('is_global')->default(false)->index('is_global');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->decimal('ticket_tco', 20, 4)->nullable()->default(0);
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->string('uuid', 255)->nullable()->index('uuid');
            $table->unsignedInteger('autoupdatesystems_id')->default(0)->index('autoupdatesystems_id');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_monitors');
    }
};
