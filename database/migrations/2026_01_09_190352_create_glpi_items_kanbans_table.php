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
        Schema::create('glpi_items_kanbans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100);
            $table->unsignedInteger('items_id')->nullable();
            $table->unsignedInteger('users_id')->index('users_id');
            $table->mediumText('state')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->unique(['itemtype', 'items_id', 'users_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_kanbans');
    }
};
