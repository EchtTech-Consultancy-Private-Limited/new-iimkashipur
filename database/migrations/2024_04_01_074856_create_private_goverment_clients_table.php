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
        Schema::create('private_goverment_clients', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('title_en',255)->index()->nullable();
            $table->string('title_hi',255)->index()->nullable();
            $table->string('title_alt',255)->index()->nullable();
            $table->string('url',255)->nullable();
            $table->boolean('sort_order')->nullable()->default(0);
            $table->longtext('public_url')->nullable();
            $table->longtext('private_url')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('asset_type')->index()->comment("1:Private,2:Goverment,3:Other")->default(0);
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
        Schema::dropIfExists('private_goverment_clients');
    }
};
