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
        Schema::create('orders', function (Blueprint $table) {
            $table->date('data_import_date');
            $table->time('data_import_time');
            $table->string('data_filename');
            $table->date('estimated_shipment_date')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('shipment_category');
            $table->string('mall_category');
            $table->string('distribution_no')->nullable();
            $table->string('shipment_id')->nullable();
            $table->string('order_category');
            $table->string('shipment_mgt_no')->primary();
            $table->string('shipment_status_code');
            $table->boolean('inspection_finished')->nullable();
            $table->datetime('inspection_finished_at')->nullable();
            $table->string('tracking_no')->nullable();
            $table->string('mall_order_no')->unique();
            $table->string('mall_name');
            $table->string('mall_postal_code')->nullable();
            $table->string('mall_address')->nullable();
            $table->string('mall_tel_no')->nullable();
            $table->datetime('ordered_at')->nullable();
            $table->string('order_name');
            $table->string('order_postal_code')->nullable();
            $table->string('order_address')->nullable();
            $table->string('order_tel_no')->nullable();
            $table->string('delivery_name');
            $table->string('delivery_postal_code');
            $table->string('delivery_prefectures')->nullable();
            $table->string('delivery_address');
            $table->string('delivery_tel_no');
            $table->date('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('order_note')->nullable();
            $table->string('shipment_method');
            $table->string('payment_method')->nullable();
            $table->integer('demanded_amount')->nullable();
            $table->integer('shipment_cost')->nullable();
            $table->integer('other_cost')->nullable();
            $table->integer('point_discount')->nullable();
            $table->integer('coupon_discount')->nullable();
            $table->integer('other_discount')->nullable();
            $table->text('delivery_slip_message')->nullable();
            $table->string('delivery_slip_note')->nullable();
            $table->string('logiless_voucher_code')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
