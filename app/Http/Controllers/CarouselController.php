<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarouselController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $datacarousel = \App\Carousel::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $datacarousel = \App\Carousel::all();
        }
        return view('carousel.index', ['datacarousel' => $datacarousel]);
    }

    public function create(Request $request)
    {   
        // dd($request->all());
        //insert data ke tabel carousel
        $carousel = \App\Carousel::create($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/carousel/',$request->file('gambar')->getClientOriginalName());
            $carousel->gambar = $request->file('gambar')->getClientOriginalName();
            $carousel->save();
        }
        return redirect('/carousel')->with('sukses', 'Data berhasil disimpan!');
    }

    public function edit(Request $request, $id)
    {
        // dd($request->all());
        $carousel = \App\Carousel::find($id);
        $carousel->update($request->all());
        
        if ($request->hasFile('gambar')) {
        $request->file('gambar')->move('assets/img/carousel/',$request->file('gambar')->getClientOriginalName());
        $carousel->gambar = $request->file('gambar')->getClientOriginalName();
        $carousel->save();
        }        
        // $iduser = $mhs->user_id;
        // $user = \App\User::find($iduser);
        // $user->update(['password'=> bcrypt($mhs->pass)]);
        return redirect('/carousel')->with('sukses', 'Data berhasil diedit!');
    }

    public function delete($id)
    {
        $carousel = \App\Carousel::find($id);
        $carousel->delete();
        return redirect('/carousel')->with('sukses', 'Data berhasil dihapus!');
    }
}
