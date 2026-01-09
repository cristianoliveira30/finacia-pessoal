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
        Schema::create('glpi_computervirtualmachines', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->unsignedInteger('computers_id')->default(0)->index('computers_id');
            $table->string('name', 255)->default('')->index('name');
            $table->unsignedInteger('virtualmachinestates_id')->default(0)->index('virtualmachinestates_id');
            $table->unsignedInteger('virtualmachinesystems_id')->default(0)->index('virtualmachinesystems_id');
            $table->unsignedInteger('virtualmachinetypes_id')->default(0)->index('virtualmachinetypes_id');
            $table->string('uuid', 255)->default('')->index('uuid');
            $table->integer('vcpu')->default(0)->index('vcpu');
            $table->unsignedInteger('ram')->nullable()->index('ram');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_computervirtualmachines');
    }
};
