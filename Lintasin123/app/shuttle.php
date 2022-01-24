<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shuttle extends Model
{
    protected $table = 'tbl_shuttle';
    protected $primaryKey = 'shuttle_id';

    public function route() {
        return $this->belongsTo('App\route', 'route_id');
    }
}
