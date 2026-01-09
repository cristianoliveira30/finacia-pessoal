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
        Schema::create('glpi_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('firstname', 255)->nullable();
            $table->string('registration_number', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('phone2', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->unsignedInteger('contacttypes_id')->default(0)->index('contacttypes_id');
            $table->mediumText('comment')->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->unsignedInteger('usertitles_id')->default(0)->index('usertitles_id');
            $table->mediumText('address')->nullable();
            $table->string('postcode', 255)->nullable();
            $table->string('town', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->mediumText('pictures')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_contacts');
    }
};
