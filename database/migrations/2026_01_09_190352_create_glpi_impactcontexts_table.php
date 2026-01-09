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
        Schema::create('glpi_impactcontexts', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('positions');
            $table->float('zoom')->default(0);
            $table->float('pan_x')->default(0);
            $table->float('pan_y')->default(0);
            $table->string('impact_color', 255)->default('');
            $table->string('depends_color', 255)->default('');
            $table->string('impact_and_depends_color', 255)->default('');
            $table->tinyInteger('show_depends')->default(1);
            $table->tinyInteger('show_impact')->default(1);
            $table->integer('max_depth')->default(5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_impactcontexts');
    }
};
