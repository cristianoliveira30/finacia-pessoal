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
        Schema::create('glpi_certificates_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('certificates_id')->default(0);
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100)->comment('see .class.php file');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['certificates_id', 'itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_certificates_items');
    }
};
