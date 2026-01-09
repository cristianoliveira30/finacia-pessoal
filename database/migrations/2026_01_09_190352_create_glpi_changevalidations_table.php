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
        Schema::create('glpi_changevalidations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('changes_id')->default(0)->index('changes_id');
            $table->unsignedInteger('users_id_validate')->default(0)->index('users_id_validate');
            $table->mediumText('comment_submission')->nullable();
            $table->mediumText('comment_validation')->nullable();
            $table->integer('status')->default(2)->index('status');
            $table->timestamp('submission_date')->nullable()->index('submission_date');
            $table->timestamp('validation_date')->nullable()->index('validation_date');
            $table->boolean('timeline_position')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_changevalidations');
    }
};
