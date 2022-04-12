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
        Schema::create('order_details', function (Blueprint $table) {
            $table->string('order_detail_id')->primary();
            $table->string('shipment_mgt_no');
            $table->integer('shipment_mgt_no_sn');
            $table->boolean('is_item_allocable')->nullable();
            $table->boolean('is_stock_allocable')->nullable();
            $table->integer('unallocated_stock_quantity')->nullable();
            $table->string('order_item_code');
            $table->string('order_item_code_delivery_slip')->nullable();
            $table->string('order_item_jan_code');
            $table->string('order_item_name_1');
            $table->string('order_item_name_2')->nullable();
            $table->integer('shipment_quantity');
            $table->integer('order_item_unit_price');
            $table->string('tax_category')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('total_item_price')->nullable();
            $table->string('item_note_1')->nullable();
            $table->timestamps();
            // 外部キー制約
            $table->foreign('shipment_mgt_no')->references('shipment_mgt_no')->on('orders')->onDelete('cascade');
            // 複合ユニーク制約
            $table->unique(['shipment_mgt_no', 'shipment_mgt_no_sn']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
