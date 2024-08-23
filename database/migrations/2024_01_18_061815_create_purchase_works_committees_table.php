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
        Schema::create('purchase_works_committees', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->string('title_name_en',255)->index()->nullable();
            $table->string('title_name_hi',255)->index()->nullable();
            $table->longtext('description_en')->index()->nullable();
            $table->longtext('description_hi')->index()->nullable();
            $table->string('name_of_supplier_party_en',355)->index()->nullable();
            $table->string('name_of_supplier_party_hi',355)->index()->nullable();
            $table->string('quality_supplied_en',355)->index()->nullable();
            $table->string('quality_supplied_hi',355)->index()->nullable();
            $table->longtext('order_contract_no')->index()->nullable();
            $table->float('amount',20,2)->index()->nullable();
            $table->longtext('images')->nullable();
            $table->longtext('public_url')->nullable();
            $table->longtext('private_url')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('pdfimage_size')->nullable();
            $table->string('file_extension')->nullable();
            $table->boolean('asset_type')->index()->comment("1:Gem,2:Committee,3:Tender")->default(0);
            $table->boolean('event_type')->comment("1:state,2:national")->default(0);
            $table->string('tab_type')->comment("0:internal, 1:External")->default(0);
            $table->boolean('status')->comment("1:Active/Approve, 0:Inactive/Stope,2:Ready For Publisher,3:Published")->default(1);
            $table->string('soft_delete')->comment('Only Soft Delete')->default(0);
            $table->string('archivel_date')->nullable();
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        
        });
        Schema::create('purchase_works_committees_type', function (Blueprint $table) {
            $table->Uuid('uid')->primary();
            $table->string('pwc_type',255)->index()->nullable();
            $table->boolean('sort_order')->nullable();
            $table->string('soft_delete')->default(0);
            $table->timestamp('delete_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::table('purchase_works_committees_type')->insert([
            ['uid'=>Uuid::uuid4(),'pwc_type' => 'Gem','sort_order'=>'1'],
            ['uid'=>Uuid::uuid4(),'pwc_type' => 'Committee','sort_order'=>'2'],
            ['uid'=>Uuid::uuid4(),'pwc_type' => 'Tender','sort_order'=>'3'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_works_committees');
        Schema::dropIfExists('purchase_works_committees_type');
    }
};
