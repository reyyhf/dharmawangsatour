<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Hotel extends Model
{
    protected $table = 'detail_hotel';
    protected $fillable = ['id_detail_hotel','id_hotel','jumlah_orang','harga','harga_breakfast',];
    public function hotel()
    {
        return $this->belongsTo('App\Hotel','id_hotel','id_hotel');
    }
}
