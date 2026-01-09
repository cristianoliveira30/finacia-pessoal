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
        Schema::create('glpi_pendingreasons_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pendingreasons_id')->default(0)->index('pendingreasons_id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100)->default('');
            $table->integer('followup_frequency')->default(0);
            $table->integer('followups_before_resolution')->default(0);
            $table->integer('bump_count')->default(0);
            $table->timestamp('last_bump_date')->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['items_id', 'itemtype'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_pendingreasons_items');
    }
};
