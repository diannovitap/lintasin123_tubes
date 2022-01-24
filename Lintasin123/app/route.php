<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    protected $table = 'tbl_route';
    protected $primaryKey = 'route_id';

    public function bus() {
        return $this->hasMany('App\bus', 'route_id');
    }
    //hasMany tabel bus relasi contoh bus memeliki banyak rute
    public function shuttle() {
        return $this->hasMany('App\shuttle', 'route_id');
    }
}
