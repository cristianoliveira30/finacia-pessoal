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
        Schema::create('glpi_computerantiviruses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('computers_id')->default(0)->index('computers_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->string('antivirus_version', 255)->nullable()->index('antivirus_version');
            $table->string('signature_version', 255)->nullable()->index('signature_version');
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_uptodate')->default(false)->index('is_uptodate');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->timestamp('date_expiration')->nullable()->index('date_expiration');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_computerantiviruses');
    }
};
