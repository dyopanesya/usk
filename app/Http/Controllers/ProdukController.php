<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Produk';
        $produks = Produk::with('kategori')->get();
        $kategoris = Kategori::all();
        return view('kantin.produk', compact('produks','title','kategoris'));
    }

    public function show($id) {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $ignore = produk::onlyTrashed()->where('namaproduk', $request->nama_produk)->first();
        if($ignore) {
            $foto = $request->file('foto');
            $foto->storeAs('public/produk', $foto->hashName());

            $ignore->restore();
            $ignore->harga = $request-> harga;
            $ignore->stock = $request->stok;
            $ignore->desc = $request->desc;
            $ignore->id_kategori = $request->id_kategori;
            $ignore->foto = $foto->hashName();
            $ignore->save();
        }
        // dd($request->all());
        $request->validate([
           'nama_produk'=>'required|string|max:255|unique:produks,nama_produk',
           'harga'=>'required|numeric',
           'stok'=>'required|numeric',
           'foto'=> 'image|mimes:jpeg,jpg,png|max:2048',
           'desc'=>'required',
           'id_kategori'=>'required|exists:kategoris,id',
        ]);
        $existingProduk = Produk::where('nama_produk', $request->nama_produk)->first();

        if ($existingProduk){
            $existingProduk->stok += $request->stok;
            $existingProduk->save();
        }else{
            $foto = $request->file('foto');
            $foto->storeAs('public/produk', $foto->hashName());

            Produk::create([
                'nama_produk'=> $request->nama_produk,
                'harga' =>  $request->harga,
                'stok' =>  $request->stok,
                'foto'=>$foto->hashName(),
                'id_kategori'=> $request->id_kategori,
                'desc' => $request->desc,
            ]);
        }
        return redirect()->back()->with('success','Berhasil menambahkan sebuah data produk baru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'nama_produk' => [
                'required',
                'string',
                'max:255',
                Rule::unique('produks', 'nama_produk')->ignore($id),
            ],
                'id_kategori' => 'required|exists:kategoris,id',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|numeric',
                'desc' => 'required'
            ]);

            $produk = Produk::find($id);

            if(!$produk) {
                return redirect()->back()->with('error', 'Produk tidak di temukan.');
            }

            if ($request->hasFile('foto')) {
                $request->validate([
                    'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                ]);

                $foto = $request->file('foto');
                if ($produk->foto !== 'default.png') {
                    Storage::delete('public/produk/' . $produk->foto);
                }
                $foto->storeAs('public/produk', $foto->hashName());

                // Storage::delete('public/produk/' . $produk->foto);
                $produk->foto = $foto->hashName();
            }

            $produk->nama_produk = $request->nama_produk;
            $produk->id_kategori = $request->id_kategori;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->desc = $request->desc;
            $produk->save();

            return redirect()->back()->with('success', 'Berhasil mengedit sebuah data produk.');
    }
    public function destroy($id)
    {
        $produk = Produk::findOrfail($id);

        $keranjangs= Keranjang::where('id_produk', $id)->get();
        foreach ($keranjangs as $keranjang){
            $keranjang->delete();
        }
        Storage::delete('public/produk/'. $produk->image);
        $produk->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus sebuah data produk.');
    }

}
