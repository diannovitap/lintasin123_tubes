<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRouteData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tbl_route')->insert([
            ['route_from' => 'BANDUNG', 'route_to' => 'JAKARTA'],
            ['route_from' => 'BANDUNG', 'route_to' => 'BEKASI'],
            ['route_from' => 'BANDUNG', 'route_to' => 'BOGOR'],
            ['route_from' => 'BANDUNG', 'route_to' => 'PURWAKARTA'],
            ['route_from' => 'BANDUNG', 'route_to' => 'SUBANG'],
            ['route_from' => 'BANDUNG', 'route_to' => 'SUMEDANG'],
            ['route_from' => 'BANDUNG', 'route_to' => 'GARUT']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
