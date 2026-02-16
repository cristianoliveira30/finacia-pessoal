<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monthly_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedSmallInteger('year');
            $table->unsignedTinyInteger('month');

            $table->decimal('salary', 10, 2)->default(0);
            $table->decimal('saving_goal', 10, 2)->nullable();
            $table->decimal('expense_limit', 10, 2)->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->unique(['user_id', 'year', 'month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monthly_settings');
    }
};
