<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_order');
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_name');
            $table->string('order_phone')->nullable();
            $table->string('order_email')->nullable();
            $table->string('order_bus');
            $table->string('order_bus_type');
            $table->string('order_bus_seat');
            $table->time('order_bus_time_departure');
            $table->date('order_bus_date_departure');
            $table->integer('order_total_price');
            $table->string('order_payment_slip')->nullable();
            $table->integer('user_id');
            $table->integer('payment_status')->nullable();
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
        Schema::dropIfExists('tbl_order');
    }
}
