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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->Uuid('role_id')->nullable();
            $table->string('role_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('last_login')->nullable();
            $table->string('login_status')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('ip')->nullable();
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->default(0);
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::table('users')->insert([
            ['name' => 'Super Admin', 'email' => 'brijesh@gmail.com', 'email_verified_at' => '2023-08-11 23:28:25', 'password' => '$2y$10$ugaph24r5kowuOdZx.3ff.hLhxK6hBVU3kZ3DReNfHP1JNkkkEDT2','role_id'=>'1','login_status'=>'0','role_name'=>'Super Admin'],
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'email_verified_at' => '2023-08-11 23:28:25', 'password' => '$2y$10$ugaph24r5kowuOdZx.3ff.hLhxK6hBVU3kZ3DReNfHP1JNkkkEDT2','role_id'=>'2','login_status'=>'0','role_name'=>'Admin'],
        ]);
        Schema::create('role_type_users', function (Blueprint $table) {
            $table->Uuid('uid')->primary();
            $table->string('role_type')->nullable();
            $table->boolean('sort_order')->nullable();
            $table->string('soft_delete')->default(0);
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::table('role_type_users')->insert([
            //['uid'=>Uuid::uuid4(),'role_type' => 'Admin','sort_order'=>'1'],
            ['uid'=>Uuid::uuid4(),'role_type' => 'Creater','sort_order'=>'1'],
            ['uid'=>Uuid::uuid4(),'role_type' => 'Approver','sort_order'=>'2'],
            ['uid'=>Uuid::uuid4(),'role_type' => 'Publisher','sort_order'=>'3'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('role_type_users');
    }
};
