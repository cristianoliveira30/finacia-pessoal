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
        Schema::create('glpi_plugin_glpiinventory_deployfiles', function (Blueprint $table) {
            $table->increments('id')->index('id');
            $table->string('name', 255);
            $table->string('mimetype', 255);
            $table->bigInteger('filesize');
            $table->text('comment')->nullable();
            $table->char('sha512', 128);
            $table->char('shortsha512', 6)->index('shortsha512');
            $table->unsignedInteger('entities_id')->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_deployfiles');
    }
};
