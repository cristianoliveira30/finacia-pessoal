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
        Schema::create('glpi_documents_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('documents_id')->default(0);
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('users_id')->nullable()->default(0)->index('users_id');
            $table->boolean('timeline_position')->default(false);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date')->nullable()->index('date');

            $table->index(['itemtype', 'items_id', 'entities_id', 'is_recursive'], 'item');
            $table->unique(['documents_id', 'itemtype', 'items_id', 'timeline_position'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_documents_items');
    }
};
