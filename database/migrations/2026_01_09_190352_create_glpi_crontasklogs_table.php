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
        Schema::create('glpi_crontasklogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('crontasks_id')->index('crontasks_id');
            $table->unsignedInteger('crontasklogs_id');
            $table->timestamp('date')->useCurrent()->index('date');
            $table->integer('state')->comment('0:start, 1:run, 2:stop');
            $table->float('elapsed')->comment('time elapsed since start');
            $table->integer('volume')->comment('for statistics');
            $table->string('content', 255)->nullable()->comment('message');

            $table->index(['crontasklogs_id', 'state'], 'crontasklogs_id_state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_crontasklogs');
    }
};
