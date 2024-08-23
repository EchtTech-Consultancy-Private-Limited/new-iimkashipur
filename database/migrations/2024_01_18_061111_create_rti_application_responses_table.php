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
        Schema::create('rti_application_responses', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('request_name_en',255)->index()->nullable();
            $table->string('request_name_hi',255)->index()->nullable();
            $table->string('pio_name_en',255)->index()->nullable();
            $table->string('pio_name_hi',255)->index()->nullable();
            $table->string('registration_number',255)->index()->nullable();
            $table->longtext('description_en')->index()->nullable();
            $table->longtext('description_hi')->index()->nullable();
            $table->longtext('images')->nullable();
            $table->longtext('request_document')->nullable();
            $table->longtext('reply_document')->nullable();
            $table->longtext('private_url')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('request_doc_pdfimage_size')->nullable();
            $table->string('request_doc_file_extension')->nullable();
            $table->string('reply_doc_pdfimage_size')->nullable();
            $table->string('reply_doc_file_extension')->nullable();
            $table->boolean('event_type')->comment("1:state,2:national")->default(0);
            $table->string('tab_type')->comment("0:internal, 1:External")->default(0);
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
        Schema::dropIfExists('rti_application_responses');
    }
};
