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
        Schema::create('glpi_savedsearches_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('savedsearches_id')->default(0)->index('savedsearches_id');

            $table->unique(['users_id', 'itemtype'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_savedsearches_users');
    }
};
