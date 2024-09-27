<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public $timestamps = false;
    protected $fillable = ['id','id_paket','id_bus','id_hotel','makan','budget_makan','snack','budget_snack','jumlah_peserta','jumlah_pendamping','hasil_hitung'];
    public function pengunjung()
    {
        return $this->belongsTo('App\Pengunjung','id_transaksi','id');
    }
}
