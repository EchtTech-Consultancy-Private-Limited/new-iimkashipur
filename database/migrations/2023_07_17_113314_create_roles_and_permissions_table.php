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
        Schema::create('roles_and_permissions', function (Blueprint $table) {
            $table->id()->primary();
            $table->Uuid('user_id')->nullable();
            $table->Uuid('role_id')->nullable();
            $table->string('role_name')->nullable();
            $table->Uuid('module_id')->nullable();
            $table->string('module_name')->nullable();
            $table->string('create')->nullable();
            $table->string('read')->nullable();
            $table->string('view')->nullable();
            $table->string('update')->nullable();
            $table->string('delete')->nullable();
            $table->string('approver')->nullable();
            $table->string('publisher')->nullable();
            $table->string('import')->nullable();
            $table->string('export')->nullable();
            $table->boolean('sort_order')->nullable()->default(0);
            $table->string('prefix')->nullable()->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->default(0);
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
        Schema::dropIfExists('roles_and_permissions');
    }
};
