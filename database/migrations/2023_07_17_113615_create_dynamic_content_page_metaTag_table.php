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
        Schema::create('dynamic_content_page_metatag', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->uuid('menu_uid');
            $table->string('menu_slug');
            $table->string('page_title_en');
            $table->string('page_title_hi');
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->string('meta_tag_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->boolean('sort_order')->nullable()->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('dynamic_content_page_gallery', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('image_title');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('public_url')->nullable();
            $table->string('private_url')->nullable();
            $table->uuid('dcpm_id');
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('dynamic_content_page_pdf', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('pdf_title');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('public_url')->nullable();
            $table->string('private_url')->nullable();
            $table->uuid('dcpm_id');
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('dynamic_page_content', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->longText('page_content_en');
            $table->longText('page_content_hi');
            $table->uuid('dcpm_id');
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('dynamic_page_banner', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->longText('banner_title_en');
            $table->longText('banner_title_hi');
            $table->string('public_url',355);
            $table->uuid('dcpm_id');
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
        Schema::dropIfExists('dynamic_content_page_metatag');
        Schema::dropIfExists('dynamic_content_page_gallery');
        Schema::dropIfExists('dynamic_content_page_pdf');
        Schema::dropIfExists('dynamic_page_content');
        Schema::dropIfExists('dynamic_page_banner');
    }
};
