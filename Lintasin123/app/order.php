<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
}
