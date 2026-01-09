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
        Schema::create('glpi_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->integer('keep_ticket')->default(0);
            $table->integer('keep_networklink')->default(0);
            $table->integer('keep_reservation')->default(0);
            $table->integer('keep_history')->default(0);
            $table->integer('keep_device')->default(0);
            $table->integer('keep_infocom')->default(0);
            $table->integer('keep_dc_monitor')->default(0);
            $table->integer('clean_dc_monitor')->default(0);
            $table->integer('keep_dc_phone')->default(0);
            $table->integer('clean_dc_phone')->default(0);
            $table->integer('keep_dc_peripheral')->default(0);
            $table->integer('clean_dc_peripheral')->default(0);
            $table->integer('keep_dc_printer')->default(0);
            $table->integer('clean_dc_printer')->default(0);
            $table->integer('keep_supplier')->default(0);
            $table->integer('clean_supplier')->default(0);
            $table->integer('keep_contact')->default(0);
            $table->integer('clean_contact')->default(0);
            $table->integer('keep_contract')->default(0);
            $table->integer('clean_contract')->default(0);
            $table->integer('keep_software')->default(0);
            $table->integer('clean_software')->default(0);
            $table->integer('keep_document')->default(0);
            $table->integer('clean_document')->default(0);
            $table->integer('keep_cartridgeitem')->default(0);
            $table->integer('clean_cartridgeitem')->default(0);
            $table->integer('keep_cartridge')->default(0);
            $table->integer('keep_consumable')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->integer('keep_disk')->default(0);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->integer('keep_certificate')->default(0);
            $table->integer('clean_certificate')->default(0);
            $table->integer('lock_updated_fields')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_transfers');
    }
};
