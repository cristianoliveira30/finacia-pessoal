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
        Schema::create('glpi_plugin_glpiinventory_deploypackages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('comment')->nullable();
            $table->unsignedInteger('entities_id')->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->string('uuid', 255)->nullable();
            $table->longText('json')->nullable();
            $table->unsignedInteger('plugin_glpiinventory_deploygroups_id')->default(0)->index('plugin_glpiinventory_deploygroups_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_deploypackages');
    }
};
