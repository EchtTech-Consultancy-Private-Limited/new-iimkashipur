<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_assign_access', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('name_en',30)->index()->nullable();
            $table->string('name_hi',30)->index()->nullable();
            $table->string('url',200)->nullable();
            $table->uuid('is_parent')->nullable()->default(0);
            $table->uuid('parent_id')->nullable()->default(0);
            $table->boolean('sort_order')->nullable()->default(0);
            $table->string('create')->nullable();
            $table->string('list')->nullable();
            $table->string('other')->nullable();
            $table->string('prefix')->nullable()->default(0);
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
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
        Schema::dropIfExists('module_assign_access');
    }
};
