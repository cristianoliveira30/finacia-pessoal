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
        Schema::create('glpi_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('serial', 255)->nullable();
            $table->string('otherserial', 255)->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->mediumText('comment')->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->unsignedInteger('certificatetypes_id')->default(0)->index('certificatetypes_id');
            $table->string('dns_name', 255)->nullable();
            $table->string('dns_suffix', 255)->nullable();
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->string('contact', 255)->nullable();
            $table->string('contact_num', 255)->nullable();
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->boolean('is_autosign')->default(false);
            $table->date('date_expiration')->nullable();
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->mediumText('command')->nullable();
            $table->mediumText('certificate_request')->nullable();
            $table->mediumText('certificate_item')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_certificates');
    }
};
