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
        Schema::create('glpi_planningexternalevents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 255)->nullable()->unique('uuid');
            $table->unsignedInteger('planningexternaleventtemplates_id')->default(0)->index('planningexternaleventtemplates_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(1)->index('is_recursive');
            $table->timestamp('date')->nullable()->index('date');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->mediumText('users_id_guests')->nullable();
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('text')->nullable();
            $table->timestamp('begin')->nullable()->index('begin');
            $table->timestamp('end')->nullable()->index('end');
            $table->mediumText('rrule')->nullable();
            $table->integer('state')->default(0)->index('state');
            $table->unsignedInteger('planningeventcategories_id')->default(0)->index('planningeventcategories_id');
            $table->tinyInteger('background')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_planningexternalevents');
    }
};
