<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $datagaleri = \App\Galeri::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $datagaleri = \App\Galeri::all();
        }
        return view('galeri.index', ['datagaleri' => $datagaleri]);
    }

    public function create(Request $request)
    {   
        // dd($request->all());
        //insert data ke tabel galeri
        $galeri = \App\Galeri::create($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/galeri/',$request->file('gambar')->getClientOriginalName());
            $galeri->gambar = $request->file('gambar')->getClientOriginalName();
            $galeri->save();
        }
        return redirect('/galeriadm')->with('sukses', 'Data berhasil disimpan!');
    }

    public function edit(Request $request, $id)
    {
        if ($request->hasFile('gambar')) {
            $galeri = \App\Galeri::find($id);
            $galeri->update($request->all());
            if ($request->hasFile('gambar')) {
                $request->file('gambar')->move('assets/img/galeri/',$request->file('gambar')->getClientOriginalName());
                $galeri->gambar = $request->file('gambar')->getClientOriginalName();
                $galeri->save();
                }        
        }else {
            $galeri = \App\Galeri::find($id);
            $gambar = $galeri->gambar;
            $galeri->update(
                ['destinasi' => $request->destinasi, 'keterangan' => $request->keterangan],
                ['gambar' => $gambar]
            );        }
        // $iduser = $mhs->user_id;
        // $user = \App\User::find($iduser);
        // $user->update(['password'=> bcrypt($mhs->pass)]);
        return redirect('/galeriadm')->with('sukses', 'Data berhasil diedit!');
    }

    public function delete($id)
    {
        $galeri = \App\Galeri::find($id);
        $galeri->delete();
        return redirect('/galeriadm')->with('sukses', 'Data berhasil dihapus!');
    }
}
