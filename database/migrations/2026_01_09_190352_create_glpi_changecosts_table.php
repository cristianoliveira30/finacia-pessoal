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
        Schema::create('glpi_changecosts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('changes_id')->default(0)->index('changes_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->date('begin_date')->nullable()->index('begin_date');
            $table->date('end_date')->nullable()->index('end_date');
            $table->integer('actiontime')->default(0);
            $table->decimal('cost_time', 20, 4)->default(0);
            $table->decimal('cost_fixed', 20, 4)->default(0);
            $table->decimal('cost_material', 20, 4)->default(0);
            $table->unsignedInteger('budgets_id')->default(0)->index('budgets_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_changecosts');
    }
};
