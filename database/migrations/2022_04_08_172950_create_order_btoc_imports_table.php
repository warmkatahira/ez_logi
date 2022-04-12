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
        Schema::create('order_btoc_imports', function (Blueprint $table) {
            $table->unsignedBigInteger('data_import_sn');
            $table->string('shipment_mgt_no')->nullable();
            $table->integer('shipment_mgt_no_sn')->nullable();
            $table->string('logiless_voucher_code');
            $table->string('mall_order_no');
            $table->datetime('ordered_at');
            $table->string('mall_name');
            $table->string('mall_postal_code');
            $table->string('mall_address');
            $table->string('mall_tel_no');
            $table->string('order_name');
            $table->string('order_postal_code');
            $table->string('order_address');
            $table->string('order_tel_no');
            $table->string('delivery_name');
            $table->string('delivery_postal_code');
            $table->string('delivery_address');
            $table->string('delivery_tel_no');
            $table->string('delivery_method');
            $table->date('delivery_date');
            $table->string('delivery_time');
            $table->string('item_note_1')->nullable();
            $table->string('delivery_slip_note')->nullable();
            $table->text('delivery_slip_message');
            $table->string('order_item_jan_code');
            $table->string('order_item_code');
            $table->string('order_item_code_delivery_slip');
            $table->string('order_item_name_1');
            $table->string('order_item_name_2')->nullable();
            $table->integer('shipment_quantity');
            $table->string('tax_category');
            $table->integer('order_item_unit_price');
            $table->integer('tax');
            $table->integer('total_item_price');
            $table->integer('point_discount');
            $table->integer('coupon_discount');
            $table->integer('other_discount');
            $table->integer('shipment_cost');
            $table->string('payment_method');
            $table->integer('other_cost');
            $table->integer('demanded_amount');
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
        Schema::dropIfExists('order_btoc_imports');
    }
};
