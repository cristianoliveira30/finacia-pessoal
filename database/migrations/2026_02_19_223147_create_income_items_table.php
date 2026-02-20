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
        Schema::create('income_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monthly_income_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('area');      // Trabalho, Renda Extra, etc
            $table->string('name');      // Salário, Freelance etc
            $table->decimal('planned', 15, 2)->default(0);
            $table->decimal('actual', 15, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_items');
    }
};
