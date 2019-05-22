<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_order')->nullable();
            $table->string('code', 150);
            $table->string('total')->nullable();
            $table->string('buyer')->bullable();
            $table->string('buyer_phone')->nullable();
            $table->string('buyer_email')->nullable();
            $table->string('buyer_address')->nullable();
            $table->string('note')->nullable();
            $table->tinyInteger('order_status')->default(0)->comment('0: Đang xử lí, 1: Đã xử lí, 2: Đang giao hàng, 3: Hủy đơn hàng');
            $table->tinyInteger('payment_status')->default(0)->comment('0: Chưa thanh toán, 1: Đã thanh toán');

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
}
