<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblShuttle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_shuttle');
        Schema::create('tbl_shuttle', function (Blueprint $table) {
            $table->id('shuttle_id');
            $table->string('shuttle_name');
            $table->string('shuttle_type');
            $table->time('shuttle_time_departure');
            $table->date('shuttle_date_departure');
            $table->integer('shuttle_price');
            $table->integer('shuttle_total_seat');
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
        Schema::dropIfExists('tbl_shuttle');
    }
}
