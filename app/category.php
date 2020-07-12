<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class category extends Model
{
    public function sub_category(){

        return $this->hasMany(sub_category::class);
    }

}
