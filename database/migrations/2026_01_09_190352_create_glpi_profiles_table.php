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
        Schema::create('glpi_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('interface', 255)->nullable()->default('helpdesk')->index('interface');
            $table->boolean('is_default')->default(false)->index('is_default');
            $table->integer('helpdesk_hardware')->default(0);
            $table->mediumText('helpdesk_item_type')->nullable();
            $table->mediumText('ticket_status')->nullable()->comment('json encoded array of from/dest allowed status change');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->mediumText('problem_status')->nullable()->comment('json encoded array of from/dest allowed status change');
            $table->boolean('create_ticket_on_login')->default(false);
            $table->unsignedInteger('tickettemplates_id')->default(0)->index('tickettemplates_id');
            $table->unsignedInteger('changetemplates_id')->default(0)->index('changetemplates_id');
            $table->unsignedInteger('problemtemplates_id')->default(0)->index('problemtemplates_id');
            $table->mediumText('change_status')->nullable()->comment('json encoded array of from/dest allowed status change');
            $table->mediumText('managed_domainrecordtypes')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_profiles');
    }
};
