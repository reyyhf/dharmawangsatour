<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $table = 'pengunjung';
    // public $timestamps = false;
    protected $fillable = ['id','nama','email','telepon','transaksi','updated_at','created_at'];
    public function transaksi()
    {
        return $this->hasOne('App\Transaksi');
    }
}
