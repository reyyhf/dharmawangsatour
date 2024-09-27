<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';
    protected $fillable = ['id_hotel','kota_hotel','nama_hotel','bintang'];

}
