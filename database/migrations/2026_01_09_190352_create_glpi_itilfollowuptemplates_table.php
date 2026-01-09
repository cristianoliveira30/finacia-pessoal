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
        Schema::create('glpi_itilfollowuptemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('content')->nullable();
            $table->unsignedInteger('requesttypes_id')->default(0)->index('requesttypes_id');
            $table->tinyInteger('is_private')->default(0)->index('is_private');
            $table->mediumText('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_itilfollowuptemplates');
    }
};
