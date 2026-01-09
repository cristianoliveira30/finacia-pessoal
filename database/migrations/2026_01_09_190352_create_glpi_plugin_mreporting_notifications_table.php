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
        Schema::create('glpi_plugin_mreporting_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0);
            $table->boolean('is_recursive')->default(false);
            $table->string('name', 255)->nullable();
            $table->longText('notepad')->nullable();
            $table->date('date_envoie')->nullable();
            $table->integer('notice')->default(0);
            $table->integer('alert')->default(0);
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable();
            $table->boolean('is_deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_mreporting_notifications');
    }
};
