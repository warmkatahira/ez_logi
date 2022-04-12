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
        Schema::create('order_btob_imports', function (Blueprint $table) {
            $table->increments('data_import_sn');
            $table->string('shipment_mgt_no')->nullable();
            $table->integer('shipment_mgt_no_sn')->nullable();
            $table->string('mall_order_no');
            $table->string('order_name');
            $table->string('delivery_name');
            $table->string('delivery_postal_code');
            $table->string('delivery_prefectures');
            $table->string('delivery_address');
            $table->string('delivery_tel_no');
            $table->string('order_item_name_1');
            $table->string('order_item_name_2')->nullable();
            $table->integer('shipment_quantity');
            $table->string('order_item_code');
            $table->string('order_item_jan_code');
            $table->integer('order_item_unit_price');
            $table->date('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('order_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_btob_imports');
    }
};
