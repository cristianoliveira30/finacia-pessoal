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
        Schema::create('glpi_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->timestamp('date')->nullable()->index('date');
            $table->timestamp('closedate')->nullable()->index('closedate');
            $table->timestamp('solvedate')->nullable()->index('solvedate');
            $table->timestamp('takeintoaccountdate')->nullable()->index('takeintoaccountdate');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('users_id_lastupdater')->default(0)->index('users_id_lastupdater');
            $table->integer('status')->default(1)->index('status');
            $table->unsignedInteger('users_id_recipient')->default(0)->index('users_id_recipient');
            $table->unsignedInteger('requesttypes_id')->default(0)->index('request_type');
            $table->longText('content')->nullable();
            $table->integer('urgency')->default(1)->index('urgency');
            $table->integer('impact')->default(1)->index('impact');
            $table->integer('priority')->default(1)->index('priority');
            $table->unsignedInteger('itilcategories_id')->default(0)->index('itilcategories_id');
            $table->integer('type')->default(1)->index('type');
            $table->integer('global_validation')->default(1)->index('global_validation');
            $table->unsignedInteger('slas_id_ttr')->default(0)->index('slas_id_ttr');
            $table->unsignedInteger('slas_id_tto')->default(0)->index('slas_id_tto');
            $table->unsignedInteger('slalevels_id_ttr')->default(0)->index('slalevels_id_ttr');
            $table->timestamp('time_to_resolve')->nullable()->index('time_to_resolve');
            $table->timestamp('time_to_own')->nullable()->index('time_to_own');
            $table->timestamp('begin_waiting_date')->nullable();
            $table->integer('sla_waiting_duration')->default(0);
            $table->integer('ola_waiting_duration')->default(0)->index('ola_waiting_duration');
            $table->unsignedInteger('olas_id_tto')->default(0)->index('olas_id_tto');
            $table->unsignedInteger('olas_id_ttr')->default(0)->index('olas_id_ttr');
            $table->unsignedInteger('olalevels_id_ttr')->default(0)->index('olalevels_id_ttr');
            $table->timestamp('ola_ttr_begin_date')->nullable();
            $table->timestamp('internal_time_to_resolve')->nullable()->index('internal_time_to_resolve');
            $table->timestamp('internal_time_to_own')->nullable()->index('internal_time_to_own');
            $table->integer('waiting_duration')->default(0);
            $table->integer('close_delay_stat')->default(0);
            $table->integer('solve_delay_stat')->default(0);
            $table->integer('takeintoaccount_delay_stat')->default(0);
            $table->integer('actiontime')->default(0);
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->integer('validation_percent')->default(0);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('ola_tto_begin_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_tickets');
    }
};
