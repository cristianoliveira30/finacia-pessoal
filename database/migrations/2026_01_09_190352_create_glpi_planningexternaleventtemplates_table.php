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
        Schema::create('glpi_planningexternaleventtemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('text')->nullable();
            $table->mediumText('comment')->nullable();
            $table->integer('duration')->default(0);
            $table->integer('before_time')->default(0);
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
        Schema::dropIfExists('glpi_planningexternaleventtemplates');
    }
};
