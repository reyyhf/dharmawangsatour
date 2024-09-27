<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $datahotel = \App\Hotel::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $datahotel = DB::table('detail_hotel')
            ->join('hotel as h','detail_hotel.id_hotel','h.id_hotel')
            ->select('id_detail_hotel','h.id_hotel','h.kota_hotel','h.nama_hotel','h.bintang','jumlah_orang','harga','harga_breakfast')
            ->orderby('id_detail_hotel','asc')
            ->orderby('h.bintang','asc')
            ->get();
        }
        return view('hotel.index', ['datahotel' => $datahotel]);
    }

    public function create(Request $request)
    {   
        
        //insert data ke tabel hotel
        $hotel = \App\Hotel::create($request->all());
               return redirect('/hotel')->with('sukses', 'Data berhasil disimpan!');
    }

    public function edit(Request $request, $id)
    {
        $pkt = \App\Hotel::find($id);
        $pkt->update($request->all());
        // $iduser = $mhs->user_id;
        // $user = \App\User::find($iduser);
        // $user->update(['password'=> bcrypt($mhs->pass)]);
        return redirect('/hotel')->with('sukses', 'Data berhasil diedit!');
    }

    public function delete($id)
    {
        $pkt = \App\Hotel::find($id);
        $pkt->delete();
        return redirect('/hotel')->with('sukses', 'Data berhasil dihapus!');
    }
}
