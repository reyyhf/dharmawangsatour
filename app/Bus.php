<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';
    protected $fillable = ['id_bus','id_paket','harga_medium','harga_big','harga_sbig','updated_at','created_at'];
    public function paket()
    {
        return $this->belongsTo('App\Paket','id','id_paket');
    }
}
