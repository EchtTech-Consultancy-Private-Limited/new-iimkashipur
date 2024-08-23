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
        Schema::create('employee_directories', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('fname_en')->nullable();
            $table->string('mname_en')->nullable();
            $table->string('lname_en')->nullable();
            $table->string('fname_hi')->nullable();
            $table->string('mname_hi')->nullable();
            $table->string('lname_hi')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('landline_number')->unique()->nullable();
            $table->string('extention_number')->nullable();
            $table->longtext('description_en')->nullable();
            $table->longtext('description_hi')->nullable();
            $table->string('google_link')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('gitHub')->nullable();
            $table->uuid('department_id')->nullable();
            $table->uuid('designation_id')->nullable();
            $table->longtext('public_url')->nullable();
            $table->longtext('private_url')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
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
        Schema::dropIfExists('employee_directories');
    }
};
