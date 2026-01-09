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
        Schema::create('glpi_networknames', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->string('name', 255)->nullable();
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('fqdns_id')->default(0)->index('fqdns_id');
            $table->unsignedInteger('ipnetworks_id')->default(0)->index('ipnetworks_id');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->index(['name', 'fqdns_id'], 'fqdn');
            $table->index(['itemtype', 'items_id', 'is_deleted'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networknames');
    }
};
