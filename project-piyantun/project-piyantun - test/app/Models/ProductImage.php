<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = [];

    public function products ()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

