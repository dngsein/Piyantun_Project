<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\Models\Pemesanan'); 
    }
}
