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
        Schema::create('glpi_problems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->integer('status')->default(1)->index('status');
            $table->longText('content')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date')->nullable()->index('date');
            $table->timestamp('solvedate')->nullable()->index('solvedate');
            $table->timestamp('closedate')->nullable()->index('closedate');
            $table->timestamp('time_to_resolve')->nullable()->index('time_to_resolve');
            $table->unsignedInteger('users_id_recipient')->default(0)->index('users_id_recipient');
            $table->unsignedInteger('users_id_lastupdater')->default(0)->index('users_id_lastupdater');
            $table->integer('urgency')->default(1)->index('urgency');
            $table->integer('impact')->default(1)->index('impact');
            $table->integer('priority')->default(1)->index('priority');
            $table->unsignedInteger('itilcategories_id')->default(0)->index('itilcategories_id');
            $table->longText('impactcontent')->nullable();
            $table->longText('causecontent')->nullable();
            $table->longText('symptomcontent')->nullable();
            $table->integer('actiontime')->default(0);
            $table->timestamp('begin_waiting_date')->nullable();
            $table->integer('waiting_duration')->default(0);
            $table->integer('close_delay_stat')->default(0);
            $table->integer('solve_delay_stat')->default(0);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_problems');
    }
};
