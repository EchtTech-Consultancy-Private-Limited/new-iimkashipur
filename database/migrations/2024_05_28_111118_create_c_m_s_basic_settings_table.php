<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_basic_settings', function (Blueprint $table) {
            $table->Uuid('uid')->primary();
            $table->string('title');
            $table->string('version');
            $table->string('watch')->comment("0:Show, 1:Hide")->nullable();
            $table->string('sucess_btn_color')->nullable();
            $table->string('cancel_btn_color')->nullable();
            $table->string('header_color')->nullable();
            $table->string('sidebar_color')->nullable();
            $table->string('hover_color')->nullable();
            $table->string('selected_color')->nullable();
            $table->string('dashboard_logo')->nullable();
            $table->string('login_logo')->nullable();
            $table->string('dashboard_logo_text')->nullable();
            $table->string('login_logo_text')->nullable();
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_basic_settings');
    }
};
