<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{

    protected $guarded = [];

    public const DITERIMA = 'diterima';
    public const DIBAYAR = 'dibayar';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function detail_pemesanan()
    {
        return $this->hasMany('App\Models\DetailPemesanan');
    }
    function review(){ return $this->hasOne(RewiewPascaMinum::class,'pemesanan_id','id'); }
}
