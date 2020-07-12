<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class product extends Model
{
    public function sub_category(){

        return $this->belongsTo(sub_category::class);
    }
}
