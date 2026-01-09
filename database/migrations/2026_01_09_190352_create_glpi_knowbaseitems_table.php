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
        Schema::create('glpi_knowbaseitems', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('name')->nullable()->fulltext('name');
            $table->longText('answer')->nullable()->fulltext('answer');
            $table->boolean('is_faq')->default(false)->index('is_faq');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->integer('view')->default(0);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('begin_date')->nullable()->index('begin_date');
            $table->timestamp('end_date')->nullable()->index('end_date');

            $table->fullText(['name', 'answer'], 'fulltext');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_knowbaseitems');
    }
};
