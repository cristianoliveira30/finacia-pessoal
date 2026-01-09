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
        Schema::create('glpi_knowbaseitems_revisions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('knowbaseitems_id');
            $table->integer('revision')->index('revision');
            $table->mediumText('name')->nullable();
            $table->longText('answer')->nullable();
            $table->string('language', 10)->nullable();
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->timestamp('date')->nullable()->index('date');

            $table->unique(['knowbaseitems_id', 'revision', 'language'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_knowbaseitems_revisions');
    }
};
