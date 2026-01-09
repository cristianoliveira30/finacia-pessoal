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
        Schema::create('glpi_crontasks', function (Blueprint $table) {
            $table->comment('Task run by internal / external cron.');
            $table->increments('id');
            $table->string('itemtype', 100);
            $table->string('name', 150)->index('name')->comment('task name');
            $table->integer('frequency')->comment('second between launch');
            $table->integer('param')->nullable()->comment('task specify parameter');
            $table->integer('state')->default(1)->comment('0:disabled, 1:waiting, 2:running');
            $table->integer('mode')->default(1)->index('mode')->comment('1:internal, 2:external');
            $table->integer('allowmode')->default(3)->comment('1:internal, 2:external, 3:both');
            $table->integer('hourmin')->default(0);
            $table->integer('hourmax')->default(24);
            $table->integer('logs_lifetime')->default(30)->comment('number of days');
            $table->timestamp('lastrun')->nullable()->comment('last run date');
            $table->integer('lastcode')->nullable()->comment('last run return code');
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->unique(['itemtype', 'name'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_crontasks');
    }
};
