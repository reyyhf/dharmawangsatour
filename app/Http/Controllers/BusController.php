<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class BusController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $databus = \App\Bus::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $databus = DB::table('bus')
            ->join('paket_destinasi as p','bus.id_paket','p.id')
            ->select('id_bus','p.id','p.kode as kode','p.destinasi as destinasi','bus.harga_medium','bus.harga_big','bus.harga_sbig')
            ->orderby('kode')
            ->get();
         
            $databus2 = DB::table('paket_destinasi')
            ->leftjoin('bus as b','id','b.id_paket')
            ->where('id_bus',null)
            ->get();
            // dd($databus2);
        }
        return view('bus.index', ['databus' => $databus,'databus2'=>$databus2]);
    }

    public function create(Request $request)
    {   
        // dd($request->all());
        //insert data ke tabel bus
        $bus = new \App\Bus;
        $bus->id_paket = $request->kode;
        $bus->harga_medium = $request->harga_medium;
        $bus->harga_big = $request->harga_big;
        $bus->harga_sbig = $request->harga_sbig;
        $bus->save();
               return redirect('/bus')->with('sukses', 'Data berhasil disimpan!');
    }

    public function edit(Request $request, $id_bus)
    {
        $bus = \App\Bus::where('id_bus',$id_bus);
        $bus->update($request->except(['_token','kode','destinasi']));
        // dd($bus);
        // $iduser = $mhs->user_id;
        // $user = \App\User::find($iduser);
        // $user->update(['password'=> bcrypt($mhs->pass)]);
        return redirect('/bus')->with('sukses', 'Data berhasil diedit!');
    }

    public function delete($id_bus)
    {
        $pkt = \App\Bus::where('id_bus',$id_bus);
        $pkt->delete();
        return redirect('/bus')->with('sukses', 'Data berhasil dihapus!');
    }
    public function cari(Request $request){
        $databus2 = DB::table('paket_destinasi')
        ->leftjoin('bus as b','id','b.id_paket')
        ->where('id_bus',null)
        ->where('id',$request->id)->first();
        return response()->json($databus2);

    }
}
