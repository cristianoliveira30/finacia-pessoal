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
        Schema::create('glpi_itils_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->default('');
            $table->unsignedInteger('items_id')->default(0);
            $table->unsignedInteger('projects_id')->default(0)->index('projects_id');

            $table->unique(['itemtype', 'items_id', 'projects_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_itils_projects');
    }
};
