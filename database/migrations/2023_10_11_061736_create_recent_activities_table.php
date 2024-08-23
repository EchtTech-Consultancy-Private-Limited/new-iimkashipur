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
        Schema::create('recent_activities', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('recent_activities_en',355)->nullable();
            $table->string('recent_activities_hi',355)->nullable();
            $table->longtext('description_en',355)->nullable();
            $table->longtext('description_hi',355)->nullable();
            $table->string('link',355)->nullable();
            $table->string('public_url')->nullable();
            $table->longtext('private_url')->nullable();
            $table->longtext('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->boolean('notification_others')->comment("1:Notification, 2:others")->default(0);
            $table->boolean('publice_status')->comment("0:Inactive, 1:Active")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->boolean('short_order')->nullable();
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
        Schema::dropIfExists('recent_activities');
    }
};
