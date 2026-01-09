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
        Schema::create('glpi_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('code', 255)->nullable()->index('code');
            $table->integer('priority')->default(1)->index('priority');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('projects_id')->default(0)->index('projects_id');
            $table->unsignedInteger('projectstates_id')->default(0)->index('projectstates_id');
            $table->unsignedInteger('projecttypes_id')->default(0)->index('projecttypes_id');
            $table->timestamp('date')->nullable()->index('date');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->timestamp('plan_start_date')->nullable()->index('plan_start_date');
            $table->timestamp('plan_end_date')->nullable()->index('plan_end_date');
            $table->timestamp('real_start_date')->nullable()->index('real_start_date');
            $table->timestamp('real_end_date')->nullable()->index('real_end_date');
            $table->integer('percent_done')->default(0)->index('percent_done');
            $table->tinyInteger('auto_percent_done')->default(0);
            $table->boolean('show_on_global_gantt')->default(false)->index('show_on_global_gantt');
            $table->longText('content')->nullable();
            $table->longText('comment')->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->unsignedInteger('projecttemplates_id')->default(0)->index('projecttemplates_id');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_projects');
    }
};
