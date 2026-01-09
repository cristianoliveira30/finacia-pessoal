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
        Schema::create('glpi_infocoms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->date('buy_date')->nullable()->index('buy_date');
            $table->date('use_date')->nullable();
            $table->integer('warranty_duration')->default(0);
            $table->string('warranty_info', 255)->nullable();
            $table->unsignedInteger('suppliers_id')->default(0)->index('suppliers_id');
            $table->string('order_number', 255)->nullable();
            $table->string('delivery_number', 255)->nullable();
            $table->string('immo_number', 255)->nullable();
            $table->decimal('value', 20, 4)->default(0);
            $table->decimal('warranty_value', 20, 4)->default(0);
            $table->integer('sink_time')->default(0);
            $table->integer('sink_type')->default(0);
            $table->float('sink_coeff')->default(0);
            $table->mediumText('comment')->nullable();
            $table->string('bill', 255)->nullable();
            $table->unsignedInteger('budgets_id')->default(0)->index('budgets_id');
            $table->integer('alert')->default(0)->index('alert');
            $table->date('order_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('inventory_date')->nullable();
            $table->date('warranty_date')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('decommission_date')->nullable();
            $table->unsignedInteger('businesscriticities_id')->default(0)->index('businesscriticities_id');

            $table->unique(['itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_infocoms');
    }
};
