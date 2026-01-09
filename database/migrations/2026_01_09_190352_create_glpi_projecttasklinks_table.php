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
        Schema::create('glpi_projecttasklinks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('projecttasks_id_source')->index('projecttasks_id_source');
            $table->string('source_uuid', 255);
            $table->unsignedInteger('projecttasks_id_target')->index('projecttasks_id_target');
            $table->string('target_uuid', 255);
            $table->tinyInteger('type')->default(0);
            $table->smallInteger('lag')->nullable()->default(0);
            $table->smallInteger('lead')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_projecttasklinks');
    }
};
