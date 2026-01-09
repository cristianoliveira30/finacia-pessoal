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
        Schema::create('glpi_plugin_formcreator_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('display_id', 255);
            $table->integer('items_id')->default(0);
            $table->string('itemtype', 255)->default('');
            $table->string('status', 255)->default('');
            $table->timestamp('date_creation')->nullable();
            $table->timestamp('date_mod')->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false);
            $table->unsignedInteger('requester_id')->default(0)->index('requester_id');
            $table->longText('comment')->nullable();
            $table->unsignedInteger('users_id_recipient')->default(0);

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_issues');
    }
};
