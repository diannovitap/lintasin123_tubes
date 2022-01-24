<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_admin');
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('admin_full_name');
            $table->date('admin_born_date')->nullable();
            $table->string('admin_address')->nullable();
            $table->string('admin_phone')->nullable();
            $table->string('admin_email');
            $table->string('admin_password');
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
        Schema::dropIfExists('tbl_admin');
    }
}
