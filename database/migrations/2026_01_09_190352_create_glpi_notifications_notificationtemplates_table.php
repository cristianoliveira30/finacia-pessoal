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
        Schema::create('glpi_notifications_notificationtemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('notifications_id')->default(0);
            $table->string('mode', 20)->index('mode')->comment('See Notification_NotificationTemplate::MODE_* constants');
            $table->unsignedInteger('notificationtemplates_id')->default(0)->index('notificationtemplates_id');

            $table->unique(['notifications_id', 'mode', 'notificationtemplates_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_notifications_notificationtemplates');
    }
};
