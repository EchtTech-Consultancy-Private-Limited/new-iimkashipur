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
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('user_id')->index()->nullable();
            $table->string('user_agent')->nullable();
            $table->string('ip')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('method')->nullable();
            $table->string('url')->nullable();
            $table->string('error_mode')->default(0);
            $table->boolean('status')->comment("1:Active, 0:Inactive")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->timestamp('deleted_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('admin_logs');
    }
};
