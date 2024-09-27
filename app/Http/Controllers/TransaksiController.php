<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $datapengunjung = \App\Pengunjung::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $datapengunjung = \App\Pengunjung::all();
        }
        return view('transaksi.index', ['datapengunjung' => $datapengunjung]);
    }

    public function detail(Request $request)
    {
        $data = \App\Transaksi::where('id',$request->id)->get()->first();
        $data2 = DB::table('pengunjung as p')
        ->join('transaksi as t','p.id_transaksi','t.id')
        ->join('hotel as h','h.id_hotel','t.id_hotel')
        ->join('paket_destinasi as pa','pa.id','t.id_paket')
        ->join('bus as b','b.id_bus','t.id_bus')
        ->select('pa.destinasi','h.nama_hotel','b.harga_medium','b.harga_big','b.harga_sbig')
        ->where('p.id_transaksi',$request->id)->first();        
        // SELECT pa.destinasi, h.nama_hotel,b.harga_medium,b.harga_big,b.harga_sbig from pengunjung as p join transaksi as t on p.id_transaksi=t.id join hotel as h on h.id_hotel=t.id_hotel join paket_destinasi as pa on pa.id=t.id_paket join bus as b on b.id_bus=t.id_bus
        // dd($data2);

        return response()->json([$data,$data2]);
    }
}
