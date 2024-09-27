<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $datapaket = \App\Paket::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $datapaket = \App\Paket::all();
        }
        return view('paket.index', ['datapaket' => $datapaket]);
    }

    public function create(Request $request)
    {   
        
        //insert data ke tabel paket
        $paket = \App\Paket::create($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/paket/',$request->file('gambar')->getClientOriginalName());
            $paket->gambar = $request->file('gambar')->getClientOriginalName();
            $paket->save();
        }
        return redirect('/paket')->with('sukses', 'Data berhasil disimpan!');
    }

    public function edit(Request $request, $id)
    {
        $pkt = \App\Paket::find($id);
        $pkt->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/paket/',$request->file('gambar')->getClientOriginalName());
            $pkt->gambar = $request->file('gambar')->getClientOriginalName();
            $pkt->save();
            }
        // $iduser = $mhs->user_id;
        // $user = \App\User::find($iduser);
        // $user->update(['password'=> bcrypt($mhs->pass)]);
        return redirect('/paket')->with('sukses', 'Data berhasil diedit!');
    }

    public function delete($id)
    {
        $pkt = \App\Paket::find($id);
        $pkt->delete();
        return redirect('/paket')->with('sukses', 'Data berhasil dihapus!');
    }
}
