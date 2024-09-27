<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class TourController extends Controller
{
    public function index()
    {
        $data_paket = DB::table('paket_destinasi')
        ->join('bus as b','id','b.id_paket')
        ->select('id','kode','destinasi','durasi','inap','jml_hotel','gambar','b.id_bus','b.harga_medium','b.harga_big','b.harga_sbig')
        ->orderby('id')
        ->get();
        // dd($data_paket);
        return view('pages.tour',['data_paket' => $data_paket]);
        
    }

    public function create(Request $request)
    {   
        // dd($request->all());
        // $transaksi = \App\Transaksi::create($request->all());

        //insert data ke tabel bus
        $transaksi = new \App\Transaksi;
        $transaksi->id_paket = $request->pilihpaket;
        $transaksi->id_bus = $request->id_bus;
        $transaksi->id_hotel = $request->id_hotel;
        $transaksi->makan = $request->makan;
        $transaksi->budget_makan = $request->budget_makan;
        $transaksi->snack = $request->snack;
        $transaksi->budget_snack = $request->budget_snack;
        $transaksi->jumlah_pendamping = $request->jumlah_pendamping;
        $transaksi->jumlah_peserta = $request->jumlah_peserta;
        $transaksi->hasil_hitung = $request->hasil_hitung;
        $transaksi->save();

        // dd($transaksi);

        $pengunjung = new \App\Pengunjung;
        $pengunjung->nama = $request->nama;
        $pengunjung->email = $request->email;
        $pengunjung->telepon = $request->telepon;
        $pengunjung->id_transaksi = $transaksi->id;
        $pengunjung->save();
               return redirect('/tour')->with('sukses', 'Data berhasil disimpan!');
    }


    public function cari2(Request $request)
    {
        $e = DB::table('detail_hotel')
        ->join('hotel as h','detail_hotel.id_hotel','h.id_hotel')
        ->select('id_detail_hotel','h.id_hotel','h.kota_hotel','h.nama_hotel','h.bintang','jumlah_orang','harga','harga_breakfast')
        ->where('kota_hotel',$request->kota_hotel)
        ->where('bintang',$request->bintang)
        ->where('jumlah_orang',$request->jumlah_orang)
        ->get()->first();
        return response()->json($e);
        // dd($e);
    }
    public function cari(Request $request)
    {
        $d= DB::table('paket_destinasi')
        ->join('bus as b','id','b.id_paket')
        ->select('id','kode','destinasi','durasi','inap','jml_hotel','gambar','b.id_bus','b.harga_medium','b.harga_big','b.harga_sbig')
        ->orderby('id')
        ->where('id',$request->id)->first();
        return response()->json($d);
    }
}
