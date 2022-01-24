<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
}
