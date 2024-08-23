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
        Schema::create('gallery_management', function (Blueprint $table){
            $table->uuid('uid')->primary();
            $table->string('title_name_en')->index()->nullable();
            $table->string('title_name_hi')->index()->nullable();
            $table->string('type')->comment("0:photo, 1:video")->default(0);
            $table->json('photo_video_collection')->nullable();
            $table->json('public_url')->nullable();
            $table->json('private_url')->nullable();
            $table->string('tab_type')->comment("0:internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('pdfimage_size')->nullable();
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('gallery_details', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->uuid('gallery_id');
            $table->string('title')->nullable();
            $table->string('type')->comment("0:photo, 1:video")->default(0);
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_file')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->string('public_url')->nullable();
            $table->string('private_url')->nullable();
            $table->string('tab_type')->comment("0:internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('deleted_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            //$table->unique(['tender_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_management');
        Schema::dropIfExists('gallery_details');
    }
};
