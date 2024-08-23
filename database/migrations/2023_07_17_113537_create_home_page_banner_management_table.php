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
        Schema::create('home_page_banner_management', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('title_name_en')->index()->nullable();
            $table->string('title_name_hi')->index()->nullable();
            $table->longtext('description_en')->index()->nullable();
            $table->longtext('description_hi')->index()->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_collection')->nullable();
            $table->string('public_url')->nullable();
            $table->string('private_url')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('sort_order')->nullable()->default(0);
            $table->string('tab_type')->comment("0:internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
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
        Schema::dropIfExists('home_page_banner_management');
    }
};
