<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_menu_management', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('name_en',30)->index()->nullable();
            $table->string('name_hi',30)->index()->nullable();
            $table->string('url',100)->nullable();
            $table->string('menu_place')->comment("0:Header, 1:Footer, 2:tooglemenu, 3:All")->default(0);
            $table->uuid('is_parent')->nullable()->default(0);
            $table->uuid('parent_id')->nullable()->default(0);
            $table->boolean('sort_order')->nullable()->default(0);
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->string('route_type')->comment("url:single slug, route:define base")->default('url');
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::table('website_menu_management')->insert([
            ['uid' => Uuid::uuid4(), 'name_en' => 'Home', 'name_hi' => 'घर', 'url' => '/','menu_place'=>'0','sort_order'=>'1','status'=>'3'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_menu_management');
    }
};
