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
        Schema::create('website_logs', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('user_id')->index()->nullable();
            $table->string('user_agent')->nullable();
            $table->string('ip')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('method')->nullable();
            $table->string('url')->nullable();
            $table->string('error_mode')->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope","2:Publisher","3:Published")->default(1);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_logs');
    }
};
