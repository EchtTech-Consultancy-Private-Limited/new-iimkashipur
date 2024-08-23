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
        Schema::create('footer_management', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('locate_map_link')->nullable();
            $table->string('copyright_name')->nullable();
            $table->longtext('content_html_en')->nullable();
            $table->longtext('content_html_hi')->nullable();
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_management');
    }
};
