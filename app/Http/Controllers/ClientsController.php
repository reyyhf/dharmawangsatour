<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $dataclients = \App\Clients::where($request->filter,'LIKE','%'.$request->cari.'%')->get();
        }else{
            $dataclients = \App\Clients::all();
        }
        return view('clients.index', ['dataclients' => $dataclients]);
    }

    public function create(Request $request)
    {   
        // dd($request->all());
        //insert data ke tabel clients
        $clients = \App\Clients::create($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/clients/',$request->file('gambar')->getClientOriginalName());
            $clients->gambar = $request->file('gambar')->getClientOriginalName();
            $clients->save();
        }
        return redirect('/clients')->with('sukses', 'Data berhasil disimpan!');
    }

    public function edit(Request $request, $id)
    {
        $clients = \App\Clients::find($id);
        $clients->update($request->all());

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/clients/',$request->file('gambar')->getClientOriginalName());
            $clients->gambar = $request->file('gambar')->getClientOriginalName();
            $clients->save();
            }
        // $iduser = $mhs->user_id;
        // $user = \App\User::find($iduser);
        // $user->update(['password'=> bcrypt($mhs->pass)]);
        return redirect('/clients')->with('sukses', 'Data berhasil diedit!');
    }

    public function delete($id)
    {
        $clients = \App\Clients::find($id);
        $clients->delete();
        return redirect('/clients')->with('sukses', 'Data berhasil dihapus!');
    }
}
