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
        Schema::create('glpi_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reservationitems_id')->default(0);
            $table->timestamp('begin')->nullable()->index('begin');
            $table->timestamp('end')->nullable()->index('end');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->mediumText('comment')->nullable();
            $table->integer('group')->default(0);

            $table->index(['reservationitems_id', 'group'], 'resagroup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_reservations');
    }
};
