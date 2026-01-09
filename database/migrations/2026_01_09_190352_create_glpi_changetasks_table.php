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
        Schema::create('glpi_changetasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 255)->nullable()->unique('uuid');
            $table->unsignedInteger('changes_id')->default(0)->index('changes_id');
            $table->unsignedInteger('taskcategories_id')->default(0)->index('taskcategories_id');
            $table->integer('state')->default(0)->index('state');
            $table->timestamp('date')->nullable()->index('date');
            $table->timestamp('begin')->nullable()->index('begin');
            $table->timestamp('end')->nullable()->index('end');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('users_id_editor')->default(0)->index('users_id_editor');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->longText('content')->nullable();
            $table->integer('actiontime')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->unsignedInteger('tasktemplates_id')->default(0)->index('tasktemplates_id');
            $table->boolean('timeline_position')->default(false);
            $table->tinyInteger('is_private')->default(0)->index('is_private');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_changetasks');
    }
};
