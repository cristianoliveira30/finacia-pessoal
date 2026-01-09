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
        Schema::create('glpi_ipnetworks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0);
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('ipnetworks_id')->default(0)->index('ipnetworks_id');
            $table->mediumText('completename')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();
            $table->boolean('addressable')->default(false);
            $table->unsignedTinyInteger('version')->nullable()->default(0);
            $table->string('name', 255)->nullable()->index('name');
            $table->string('address', 40)->nullable();
            $table->unsignedInteger('address_0')->default(0);
            $table->unsignedInteger('address_1')->default(0);
            $table->unsignedInteger('address_2')->default(0);
            $table->unsignedInteger('address_3')->default(0);
            $table->string('netmask', 40)->nullable();
            $table->unsignedInteger('netmask_0')->default(0);
            $table->unsignedInteger('netmask_1')->default(0);
            $table->unsignedInteger('netmask_2')->default(0);
            $table->unsignedInteger('netmask_3')->default(0);
            $table->string('gateway', 40)->nullable();
            $table->unsignedInteger('gateway_0')->default(0);
            $table->unsignedInteger('gateway_1')->default(0);
            $table->unsignedInteger('gateway_2')->default(0);
            $table->unsignedInteger('gateway_3')->default(0);
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->index(['address_0', 'address_1', 'address_2', 'address_3'], 'address');
            $table->index(['gateway_0', 'gateway_1', 'gateway_2', 'gateway_3'], 'gateway');
            $table->index(['netmask_0', 'netmask_1', 'netmask_2', 'netmask_3'], 'netmask');
            $table->index(['entities_id', 'address', 'netmask'], 'network_definition');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_ipnetworks');
    }
};
