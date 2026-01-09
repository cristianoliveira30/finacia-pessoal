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
        Schema::create('glpi_projecttasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 255)->nullable()->unique('uuid');
            $table->string('name', 255)->nullable()->index('name');
            $table->longText('content')->nullable();
            $table->longText('comment')->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('projects_id')->default(0)->index('projects_id');
            $table->unsignedInteger('projecttasks_id')->default(0)->index('projecttasks_id');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('plan_start_date')->nullable()->index('plan_start_date');
            $table->timestamp('plan_end_date')->nullable()->index('plan_end_date');
            $table->timestamp('real_start_date')->nullable()->index('real_start_date');
            $table->timestamp('real_end_date')->nullable()->index('real_end_date');
            $table->integer('planned_duration')->default(0);
            $table->integer('effective_duration')->default(0);
            $table->unsignedInteger('projectstates_id')->default(0)->index('projectstates_id');
            $table->unsignedInteger('projecttasktypes_id')->default(0)->index('projecttasktypes_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->integer('percent_done')->default(0)->index('percent_done');
            $table->tinyInteger('auto_percent_done')->default(0);
            $table->boolean('is_milestone')->default(false)->index('is_milestone');
            $table->unsignedInteger('projecttasktemplates_id')->default(0)->index('projecttasktemplates_id');
            $table->boolean('is_template')->default(false)->index('is_template');
            $table->string('template_name', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_projecttasks');
    }
};
