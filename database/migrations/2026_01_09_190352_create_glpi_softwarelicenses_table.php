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
        Schema::create('glpi_softwarelicenses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('softwares_id')->default(0);
            $table->unsignedInteger('softwarelicenses_id')->default(0)->index('softwarelicenses_id');
            $table->mediumText('completename')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->integer('number')->default(0);
            $table->unsignedInteger('softwarelicensetypes_id')->default(0)->index('softwarelicensetypes_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('serial', 255)->nullable()->index('serial');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->unsignedInteger('softwareversions_id_buy')->default(0)->index('softwareversions_id_buy');
            $table->unsignedInteger('softwareversions_id_use')->default(0)->index('softwareversions_id_use');
            $table->date('expire')->nullable()->index('expire');
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->boolean('is_valid')->default(true);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->boolean('is_helpdesk_visible')->default(false)->index('is_helpdesk_visible');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->string('contact', 255)->nullable();
            $table->string('contact_num', 255)->nullable();
            $table->tinyInteger('allow_overquota')->default(0)->index('allow_overquota');
            $table->mediumText('pictures')->nullable();
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();

            $table->index(['softwares_id', 'expire', 'number'], 'softwares_id_expire_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_softwarelicenses');
    }
};
