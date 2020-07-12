<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class sub_category extends Model
{
    public function product(){

        return $this->hasMany(product::class);
    }

    public function category(){

        return $this->belongsTo(category::class);
    }
}
