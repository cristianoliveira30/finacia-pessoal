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
        Schema::create('glpi_softwares', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->boolean('is_update')->default(false)->index('is_update');
            $table->unsignedInteger('softwares_id')->default(0)->index('softwares_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->decimal('ticket_tco', 20, 4)->nullable()->default(0);
            $table->boolean('is_helpdesk_visible')->default(true)->index('is_helpdesk_visible');
            $table->unsignedInteger('softwarecategories_id')->default(0)->index('softwarecategories_id');
            $table->boolean('is_valid')->default(true);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->mediumText('pictures')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_softwares');
    }
};
