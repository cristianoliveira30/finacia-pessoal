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
        Schema::create('glpi_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100);
            $table->unsignedInteger('items_id')->default(0);
            $table->integer('type')->default(0)->index('type')->comment('see define.php ALERT_* constant');
            $table->timestamp('date')->useCurrent()->index('date');

            $table->unique(['itemtype', 'items_id', 'type'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_alerts');
    }
};
