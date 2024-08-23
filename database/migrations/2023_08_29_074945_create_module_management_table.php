<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_management', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('name_en',30)->index()->nullable();
            $table->string('name_hi',30)->index()->nullable();
            $table->string('url',100)->nullable();
            $table->uuid('is_parent')->nullable()->default(0);
            $table->uuid('parent_id')->nullable()->default(0);
            $table->boolean('sort_order')->nullable()->default(0);
            $table->string('prefix')->nullable()->default(0);
            $table->boolean('tab_type')->comment("0:Internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::table('module_management')->insert([
            ['uid' => Uuid::uuid4(), 'name_en' => 'Dashboard', 'name_hi' => 'डैशबोर्ड', 'url' => 'dashboard','sort_order'=>'1','prefix'=>'dashboard','status'=>'3'],
            ['uid' => Uuid::uuid4(), 'name_en' => 'User Management', 'name_hi' => 'प्रयोक्ता प्रबंधन', 'url' => '#','sort_order'=>'2','prefix'=>'user','status'=>'3'],
            //['uid' => Uuid::uuid4(), 'name_en' => 'Developer', 'name_hi' => 'डेवलपर', 'url' => 'developer-list','sort_order'=>'9','prefix'=>'developer-list','status'=>'3'],
            ['uid' => Uuid::uuid4(), 'name_en' => 'Audit Trail', 'name_hi' => 'लेखापरीक्षा', 'url' => 'audit-trail','sort_order'=>'10','prefix'=>'audit-trail','status'=>'3'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_management');
    }
};
