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
        Schema::create('glpi_notimportedemails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from', 255);
            $table->string('to', 255);
            $table->unsignedInteger('mailcollectors_id')->default(0)->index('mailcollectors_id');
            $table->timestamp('date')->useCurrent();
            $table->mediumText('subject')->nullable();
            $table->string('messageid', 255);
            $table->integer('reason')->default(0);
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_notimportedemails');
    }
};
