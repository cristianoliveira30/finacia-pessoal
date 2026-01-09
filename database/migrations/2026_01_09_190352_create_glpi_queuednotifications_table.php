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
        Schema::create('glpi_queuednotifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->unsignedInteger('notificationtemplates_id')->default(0)->index('notificationtemplates_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->integer('sent_try')->default(0)->index('sent_try');
            $table->timestamp('create_time')->nullable()->index('create_time');
            $table->timestamp('send_time')->nullable()->index('send_time');
            $table->timestamp('sent_time')->nullable()->index('sent_time');
            $table->mediumText('name')->nullable();
            $table->mediumText('sender')->nullable();
            $table->mediumText('sendername')->nullable();
            $table->mediumText('recipient')->nullable();
            $table->mediumText('recipientname')->nullable();
            $table->mediumText('replyto')->nullable();
            $table->mediumText('replytoname')->nullable();
            $table->mediumText('headers')->nullable();
            $table->longText('body_html')->nullable();
            $table->longText('body_text')->nullable();
            $table->mediumText('messageid')->nullable();
            $table->mediumText('documents')->nullable();
            $table->string('mode', 20)->index('mode')->comment('See Notification_NotificationTemplate::MODE_* constants');
            $table->string('event', 255)->nullable();

            $table->index(['itemtype', 'items_id', 'notificationtemplates_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_queuednotifications');
    }
};
