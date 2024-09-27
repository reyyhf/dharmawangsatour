<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tentang_kami';
    protected $fillable = ['id','poin_tentang_kami','detail_tentang_kami','created_at','updated_at'];
}
