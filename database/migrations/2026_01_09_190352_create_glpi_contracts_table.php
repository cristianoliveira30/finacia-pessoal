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
        Schema::create('glpi_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('num', 255)->nullable();
            $table->unsignedInteger('contracttypes_id')->default(0)->index('contracttypes_id');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->date('begin_date')->nullable()->index('begin_date');
            $table->integer('duration')->default(0);
            $table->integer('notice')->default(0);
            $table->integer('periodicity')->default(0);
            $table->integer('billing')->default(0);
            $table->mediumText('comment')->nullable();
            $table->string('accounting_number', 255)->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->time('week_begin_hour')->default('00:00:00');
            $table->time('week_end_hour')->default('00:00:00');
            $table->time('saturday_begin_hour')->default('00:00:00');
            $table->time('saturday_end_hour')->default('00:00:00');
            $table->boolean('use_saturday')->default(false)->index('use_saturday');
            $table->time('sunday_begin_hour')->default('00:00:00');
            $table->time('sunday_end_hour')->default('00:00:00');
            $table->tinyInteger('use_sunday')->default(0)->index('use_sunday');
            $table->integer('max_links_allowed')->default(0);
            $table->integer('alert')->default(0)->index('alert');
            $table->integer('renewal')->default(0);
            $table->string('template_name', 255)->nullable();
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_contracts');
    }
};
