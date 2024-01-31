<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kategori';
        $kategoris=Kategori::all();
        return view('kantin.kategori',compact('title','kategoris'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function store (Request $request)
    {
        $request->validate([
            'nama_kategori'=>'required|string|max:255|unique:kategoris,nama_kategori',
        ]);
        Kategori::create([
            'nama_kategori'=>$request->nama_kategori,
        ]);
        return redirect()->back()->with('succses','Berhasil manambahkan sebuah data kategori baru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(request $request,i$d)
    {
        
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
        ]);

        $kategori = Kategori::find($id);

        if (!$kategori){
            return redirect()->back()->with('error', 'kategori tidak Ditemukan.');
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->back()->with('success', 'Berhasil mengediit sebuah data kategori
        
        ');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrfail($id);

        $kategori->delete();

        return redirect()->back()->with('sucess', 'Berhasil menghapus sebuah data kategori');
    }
}
