<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'category_id', 'name', 'image', 'short_desc', 'full_desc', 'price', 'status_product_id', 'star',
    ];
    public function status_product()
    {
        return $this->belongsTo('App\Models\StatusProduct', 'status_product_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
