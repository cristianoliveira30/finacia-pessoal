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
        Schema::create('glpi_networkportwifis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('networkports_id')->default(0)->unique('networkports_id');
            $table->unsignedInteger('items_devicenetworkcards_id')->default(0)->index('card');
            $table->unsignedInteger('wifinetworks_id')->default(0)->index('essid');
            $table->unsignedInteger('networkportwifis_id')->default(0)->index('networkportwifis_id');
            $table->string('version', 20)->nullable()->index('version')->comment('a, a/b, a/b/g, a/b/g/n, a/b/g/n/y');
            $table->string('mode', 20)->nullable()->index('mode')->comment('ad-hoc, managed, master, repeater, secondary, monitor, auto');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkportwifis');
    }
};
