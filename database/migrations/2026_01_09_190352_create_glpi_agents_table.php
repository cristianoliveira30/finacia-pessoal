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
        Schema::create('glpi_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deviceid', 255)->unique('deviceid');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('agenttypes_id')->index('agenttypes_id');
            $table->timestamp('last_contact')->nullable();
            $table->string('version', 255)->nullable();
            $table->tinyInteger('locked')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('items_id');
            $table->string('useragent', 255)->nullable();
            $table->string('tag', 255)->nullable();
            $table->string('port', 6)->nullable();
            $table->integer('threads_networkdiscovery')->default(1)->comment('Number of threads for Network Discovery');
            $table->integer('threads_networkinventory')->default(1)->comment('Number of threads for Network Inventory');
            $table->integer('timeout_networkdiscovery')->default(0)->comment('Network Discovery task timeout (disabled by default)');
            $table->integer('timeout_networkinventory')->default(0)->comment('Network Inventory task timeout (disabled by default)');
            $table->string('remote_addr', 255)->nullable();
            $table->tinyInteger('use_module_wake_on_lan')->default(0);
            $table->tinyInteger('use_module_computer_inventory')->default(0);
            $table->tinyInteger('use_module_esx_remote_inventory')->default(0);
            $table->tinyInteger('use_module_remote_inventory')->default(0);
            $table->tinyInteger('use_module_network_inventory')->default(0);
            $table->tinyInteger('use_module_network_discovery')->default(0);
            $table->tinyInteger('use_module_package_deployment')->default(0);
            $table->tinyInteger('use_module_collect_data')->default(0);

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_agents');
    }
};
