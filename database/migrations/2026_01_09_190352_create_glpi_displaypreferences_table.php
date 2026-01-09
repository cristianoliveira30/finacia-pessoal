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
        Schema::create('glpi_displaypreferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->index('itemtype');
            $table->integer('num')->default(0)->index('num');
            $table->integer('rank')->default(0)->index('rank');
            $table->unsignedInteger('users_id')->default(0);

            $table->unique(['users_id', 'itemtype', 'num'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_displaypreferences');
    }
};
