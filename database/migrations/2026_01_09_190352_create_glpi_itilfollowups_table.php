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
        Schema::create('glpi_itilfollowups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100);
            $table->unsignedInteger('items_id')->default(0);
            $table->timestamp('date')->nullable()->index('date');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('users_id_editor')->default(0)->index('users_id_editor');
            $table->longText('content')->nullable();
            $table->boolean('is_private')->default(false)->index('is_private');
            $table->unsignedInteger('requesttypes_id')->default(0)->index('requesttypes_id');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->boolean('timeline_position')->default(false);
            $table->unsignedInteger('sourceitems_id')->default(0)->index('sourceitems_id');
            $table->unsignedInteger('sourceof_items_id')->default(0)->index('sourceof_items_id');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_itilfollowups');
    }
};
