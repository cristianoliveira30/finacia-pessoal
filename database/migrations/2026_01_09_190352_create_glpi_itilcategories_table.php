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
        Schema::create('glpi_itilcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('itilcategories_id')->default(0)->index('itilcategories_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('completename')->nullable();
            $table->mediumText('comment')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->unsignedInteger('knowbaseitemcategories_id')->default(0)->index('knowbaseitemcategories_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->string('code', 255)->nullable();
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();
            $table->boolean('is_helpdeskvisible')->default(true)->index('is_helpdeskvisible');
            $table->unsignedInteger('tickettemplates_id_incident')->default(0)->index('tickettemplates_id_incident');
            $table->unsignedInteger('tickettemplates_id_demand')->default(0)->index('tickettemplates_id_demand');
            $table->unsignedInteger('changetemplates_id')->default(0)->index('changetemplates_id');
            $table->unsignedInteger('problemtemplates_id')->default(0)->index('problemtemplates_id');
            $table->integer('is_incident')->default(1)->index('is_incident');
            $table->integer('is_request')->default(1)->index('is_request');
            $table->integer('is_problem')->default(1)->index('is_problem');
            $table->boolean('is_change')->default(true)->index('is_change');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_itilcategories');
    }
};
