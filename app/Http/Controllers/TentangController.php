<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TentangController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $datatentang = \App\Tentang::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $datatentang = \App\Tentang::all();
        }
        return view('tentang.index', ['datatentang' => $datatentang]);
    }

    public function create(Request $request)
    {   
        // dd($request->all());
        //insert data ke tabel tentang
        $tentang = \App\Tentang::create($request->all());
        // if ($request->hasFile('gambar')) {
        //     $request->file('gambar')->move('assets/img/aboutadm/',$request->file('gambar')->getClientOriginalName());
        //     $tentang->gambar = $request->file('gambar')->getClientOriginalName();
        //     $tentang->save();
        // }
        return redirect('/aboutadm')->with('sukses', 'Data berhasil disimpan!');
    }

    public function edit(Request $request, $id)
    {
        $tentang = \App\Tentang::find($id);
        $tentang->update($request->all());

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/aboutadm/',$request->file('gambar')->getClientOriginalName());
            $tentang->gambar = $request->file('gambar')->getClientOriginalName();
            $tentang->save();
            }
        // $iduser = $mhs->user_id;
        // $user = \App\User::find($iduser);
        // $user->update(['password'=> bcrypt($mhs->pass)]);
        return redirect('/aboutadm')->with('sukses', 'Data berhasil diedit!');
    }

    public function delete($id)
    {
        $tentang = \App\Tentang::find($id);
        $tentang->delete();
        return redirect('/aboutadm')->with('sukses', 'Data berhasil dihapus!');
    }
}
