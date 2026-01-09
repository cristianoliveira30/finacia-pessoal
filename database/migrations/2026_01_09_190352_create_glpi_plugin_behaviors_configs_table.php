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
        Schema::create('glpi_plugin_behaviors_configs', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->boolean('use_requester_item_group')->default(false);
            $table->boolean('use_requester_user_group')->default(false);
            $table->boolean('is_ticketsolutiontype_mandatory')->default(false);
            $table->boolean('is_ticketsolution_mandatory')->default(false);
            $table->boolean('is_ticketcategory_mandatory')->default(false);
            $table->boolean('is_ticketcategory_mandatory_on_assign')->default(false);
            $table->boolean('is_tickettaskcategory_mandatory')->default(false);
            $table->boolean('is_tickettech_mandatory')->default(false);
            $table->boolean('is_tickettechgroup_mandatory')->default(false);
            $table->boolean('is_ticketrealtime_mandatory')->default(false);
            $table->boolean('is_ticketlocation_mandatory')->default(false);
            $table->boolean('is_requester_mandatory')->default(false);
            $table->boolean('is_ticketdate_locked')->default(false);
            $table->boolean('use_assign_user_group')->default(false);
            $table->boolean('use_assign_user_group_update')->default(false);
            $table->boolean('ticketsolved_updatetech')->default(false);
            $table->string('tickets_id_format', 15)->nullable();
            $table->string('changes_id_format', 15)->nullable();
            $table->boolean('is_problemsolutiontype_mandatory')->default(false);
            $table->boolean('remove_from_ocs')->default(false);
            $table->boolean('add_notif')->default(false);
            $table->boolean('use_lock')->default(false);
            $table->integer('single_tech_mode')->default(0);
            $table->boolean('myasset')->default(false);
            $table->boolean('groupasset')->default(false);
            $table->boolean('clone')->default(false);
            $table->boolean('is_tickettasktodo')->default(false);
            $table->timestamp('date_mod')->nullable();
            $table->mediumText('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_behaviors_configs');
    }
};
