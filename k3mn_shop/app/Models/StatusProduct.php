<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
    //
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
