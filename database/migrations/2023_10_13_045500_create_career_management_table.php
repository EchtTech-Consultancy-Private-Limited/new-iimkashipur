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
        Schema::create('career_management', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('title_name_en')->index()->nullable();
            $table->string('title_name_hi')->index()->nullable();
            $table->longtext('description_en')->index()->nullable();
            $table->longtext('description_hi')->index()->nullable();
            $table->longtext('images')->nullable();
            $table->longtext('public_url')->nullable();
            $table->longtext('private_url')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('event_type')->comment("1:state,2:national")->default(0);
            $table->string('tab_type')->comment("0:internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        
        });
        Schema::create('career_management_details', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->uuid('career_management_id');
          //  $table->foreign('career_management_id')->references('uid')->on('career_management')->onDelete('cascade');
            //$table->uuid('rti_assets_id');
            $table->string('title')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_file')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->longtext('public_url')->nullable();
            $table->longtext('private_url')->nullable();
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_management');
    }
};
