<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus extends Model
{
    protected $table = 'tbl_bus';
    protected $primaryKey = 'bus_id';

    public function route() {
        return $this->belongsTo('App\route', 'route_id');

        //join bus kedalam route
    }
}
