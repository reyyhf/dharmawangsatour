<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket_destinasi';
    protected $fillable = ['id','kode','destinasi','durasi','inap','jml_hotel','gambar'];
    public function bus()
    {
        return $this->hasOne('App\Bus');
    }
}
