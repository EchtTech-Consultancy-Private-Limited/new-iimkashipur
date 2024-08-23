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
        Schema::create('dynamic_form_management', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->uuid('menu_uid');
            $table->string('menu_slug')->unique();
            $table->string('page_title_en')->unique();
            $table->string('page_title_hi')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->string('meta_tag_description')->nullable();
            $table->string('meta_keywords')->nullable();
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
        Schema::dropIfExists('dynamic_form_management');
    }
};
