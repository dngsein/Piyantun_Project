<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product_images () 
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function detail_pemesanan()
    {
        return $this->hasMany('App\Models\DetailPemesanan');
    }
}

