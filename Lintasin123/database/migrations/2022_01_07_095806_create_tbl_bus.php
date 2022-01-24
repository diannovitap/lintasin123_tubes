<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_bus');
        Schema::create('tbl_bus', function (Blueprint $table) {
            $table->id('bus_id');
            $table->string('bus_name');
            $table->string('bus_type');
            $table->time('bus_time_departure');
            $table->date('bus_date_departure');
            $table->integer('bus_price');
            $table->integer('bus_total_seat');
            $table->integer('route_id');
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
        Schema::dropIfExists('tbl_bus');
    }
}
